<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Sales;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use function Laravel\Prompts\select;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SalesResource\Pages;

use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SalesResource\RelationManagers;

class SalesResource extends Resource
{
    protected static ?string $model = Sales::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    protected static ?string $navigationLabel = 'Data Penjualan';
    protected static ?string $slug = 'data-penjualan';

    protected static ?string $navigationGroup = 'Kelola Data';

    public static ?string $label = 'Data Penjualan';

    protected static ?string $navigation;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('slug')
                    ->prefix('trx')
                    ->numeric()
                    ->required()
                    ->unique()
                    ->placeholder('000')
                    ->minLength(3)
                    ->maxLength(3)
                    ->label('Kode Transaksi')
                    ->dehydrateStateUsing(fn($state) => str_starts_with($state, 'trx') ? $state : 'trx' . $state),

                Select::make('product_id')
                    ->label('Pilih Produk')
                    ->relationship('product', 'titleProduct')  // Mengambil produk dari relasi
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Cari harga produk berdasarkan ID
                        $harga = \App\Models\Product::find($state)?->harga ?? 0;
                        $set('harga', $harga);

                        // $id = \App\Models\Product::find($state)?->id ?? '';
                        // $set('idproduct', $id);
                    }),

                Select::make('employee_id')
                    ->label('Pilih Pegawai')
                    ->relationship('employee', 'namaKaryawan')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Pastikan bahwa nilai 'state' bukan null atau 0
                        // $id = \App\Models\Employee::find($state)?->id ?? '';
                        // $set('idpgw', $id);
                    }),


                DatePicker::make('tglTransaksi')
                    ->required()
                    ->label('Tanggal Transaksi'),

                Select::make('metodeBayar')
                    ->options([
                        '1' => 'Tunai',
                        '2' => 'Non Tunai',
                    ])
                    ->required()
                    ->label('Metode Pembayaran'),

                TextInput::make('harga')
                    ->label('Harga Produk')
                    ->required()
                    ->prefix('Rp. ')
                    ->disabled(),  // Non-editable

                TextInput::make('jumlahBeli')
                    ->label('Jumlah Produk Yang Dibeli')
                    ->required()
                    ->numeric()
                    ->reactive()
                    ->placeholder('Masukkan Jumlah Produk Yang Dibeli')
                    ->minLength(1)
                    ->maxLength(3)
                    ->afterStateUpdated(function ($state, callable $set, $get) {
                        // Ambil harga dari form
                        $harga = $get('harga') ?? 0;
                        // Hitung total bayar
                        $set('totalBayar', $harga * $state);
                    }),

                TextInput::make('totalBayar')
                    ->label('Total Yang Harus Dibayar')
                    ->prefix('Rp. ')
                    ->required()
                    ->numeric()
                    ->reactive()
                    ->readOnly()
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('slug')
                    ->sortable()
                    ->label('Kode Transaksi')
                    ->searchable(isIndividual: true),
                TextColumn::make('product.titleProduct')  // Mengakses relasi langsung
                    ->label('Nama Produk')
                    ->sortable()
                    ->searchable()->searchable(isIndividual: true)
                    ->getStateUsing(fn($record) => $record->product->titleProduct ?? 'Unknown'),
                TextColumn::make('employee.namaKaryawan')  // Mengakses relasi langsung
                    ->label('Nama Pegawai')
                    ->sortable()
                    ->searchable()->searchable(isIndividual: true)
                    ->getStateUsing(fn($record) => $record->employee->namaKaryawan ?? 'Unknown'),
                TextColumn::make('tglTransaksi')->dateTime('l, d M Y')->sortable()
                    ->searchable()
                    ->label('Tanggal Transaksi'),
                TextColumn::make('metodeBayar')
                    ->sortable()
                    ->searchable()
                    ->label('Metode Pembayaran')
                    ->formatStateUsing(fn($state) => match ($state) {
                        '1' => 'Tunai',
                        '2' => 'Non Tunai',
                        default => 'Tidak Diketahui',
                    }),
                TextColumn::make('jumlahBeli')
                    ->sortable()
                    ->searchable()
                    ->label('Jumlah Yang Dibeli'),
                TextColumn::make('totalBayar')
                    ->money('idr')
                    ->sortable()
                    ->searchable()
                    ->label('Total Yang Dibayarkan'),
            ])
            ->filters([
                //
                Tables\Filters\TrashedFilter::make(),
            ])
            ->defaultSort('slug', 'asc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSales::route('/'),
            'create' => Pages\CreateSales::route('/create'),
            'edit' => Pages\EditSales::route('/{record}/edit'),
        ];
    }
}
