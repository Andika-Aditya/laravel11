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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('slug')
                    ->prefix('trx')
                    ->required()
                    ->unique()
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

                        $id = \App\Models\Product::find($state)?->id ?? '';
                        $set('idproduct', $id);
                    }),

                Select::make('employee_id')
                    ->label('Pilih Pegawai')
                    ->relationship('employee', 'namaKaryawan')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Pastikan bahwa nilai 'state' bukan null atau 0
                        $id = \App\Models\Employee::find($state)?->id ?? '';
                        $set('idpgw', $id);
                    }),


                DatePicker::make('tglTransaksi')->required()->label('Tanggal Transaksi'),

                Select::make('metodeBayar')->options([
                    '1' => 'Tunai',
                    '2' => 'Non Tunai',
                ])->required(),

                TextInput::make('harga')
                    ->label('Harga Produk')
                    ->required()
                    ->disabled(),  // Non-editable

                TextInput::make('jumlahBeli')
                    ->label('Jumlah Beli')
                    ->required()
                    ->numeric()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, $get) {
                        // Ambil harga dari form
                        $harga = $get('harga') ?? 0;
                        // Hitung total bayar
                        $set('totalBayar', $harga * $state);
                    }),

                TextInput::make('totalBayar')
                    ->label('Total Bayar')
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
                TextColumn::make('slug')->sortable()->searchable(isIndividual: true),
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
                TextColumn::make('tglTransaksi')->dateTime('l, d M Y')->sortable()->searchable()->label('Tanggal Transaksi'),
                TextColumn::make('metodeBayar')->sortable()->searchable()->formatStateUsing(fn($state) => match ($state) {
                    '1' => 'Tunai',
                    '2' => 'Non Tunai',
                    default => 'Tidak Diketahui',
                }),
                TextColumn::make('jumlahBeli')->sortable()->searchable(),
                TextColumn::make('totalBayar')->money('idr')->sortable()->searchable()
            ])
            ->filters([
                //
            ])
            ->defaultSort('slug', 'asc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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