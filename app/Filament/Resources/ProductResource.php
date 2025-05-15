<?php

namespace App\Filament\Resources;

use Dom\Text;
use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationLabel = 'Data Produk';

    protected static ?string $slug = 'data-produk';

    public static ?string $label = 'Data Produk';

    protected static ?string $navigationGroup = 'Kelola Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('slug')
                    ->numeric()
                    ->prefix('obt')
                    ->required()
                    ->unique()
                    ->label('Kode Produk')
                    ->placeholder('000')
                    ->minLength(3)
                    ->maxLength(3)
                    ->dehydrateStateUsing(fn($state) => str_starts_with($state, 'obt') ? $state : 'obt' . $state),
                TextInput::make('titleProduct')
                    ->autocapitalize('words')
                    ->required()
                    ->placeholder('Masukkan Nama Produk')
                    ->label('Nama Produk')
                    ->minLength(2)
                    ->maxLength(255),
                Select::make('overview')
                    ->options([
                        '1' => 'Antibiotik Oral',
                        '2' => 'Antihistamin Tablet',
                        '3' => 'Obat Sakit',
                        '4' => 'Vitamin C',
                        '5' => 'Antipiretik Sirup',
                        '6' => 'Obat Luka',
                        '7' => 'Antasida Cair',
                        '8' => 'Obat Batuk',
                        '9' => 'Obat Demam',
                        '10' => 'Obat Maag',
                        '11' => 'Obat Flu',
                        '12' => 'Antinyeri Topikal',
                        '13' => 'Obat Diare',
                        '14' => 'Obat Kulit',
                        '15' => 'Obat Gatal',
                        '16' => 'Obat Jerawat',
                        '17' => 'Obat Tetes',
                        '18' => 'Obat Herbal',
                        '19' => 'Obat Migrain',
                        '20' => 'Antifungal Krim'
                    ])
                    ->label('Jenis Produk')
                    ->required(),
                TextInput::make('harga')
                    ->numeric()
                    ->required()
                    ->prefix('RP. ')
                    ->placeholder('Masukkan Harga Produk'),
                FileUpload::make('imgProduct')
                    ->label('Upload File Gambar')
                    ->required()
                    ->placeholder('Upload Gambar Produk'),
                Textarea::make('descriptionProduct')
                    ->rows(10)
                    ->cols(20)
                    ->required()
                    ->placeholder('Masukkan Deskripsi Produk')
                    ->minLength(2)
                    ->maxLength(255)
                    ->label('Deskripsi Produk'),
                DatePicker::make('expired')
                    ->required()
                    ->label('Tanggal Kadaluarsa'),
                TextInput::make('stok')
                    ->numeric()
                    ->required()
                    ->placeholder('Stok Produk'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('slug')
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('Kode Produk'),
                TextColumn::make('titleProduct')
                    ->sortable()
                    ->searchable()
                    ->label('Nama Produk'),
                TextColumn::make('overview')
                    ->formatStateUsing(fn($state) => match ($state) {
                        '1' => 'Antibiotik Oral',
                        '2' => 'Antihistamin Tablet',
                        '3' => 'Obat Sakit',
                        '4' => 'Vitamin C',
                        '5' => 'Antipiretik Sirup',
                        '6' => 'Obat Luka',
                        '7' => 'Antasida Cair',
                        '8' => 'Obat Batuk',
                        '9' => 'Obat Demam',
                        '10' => 'Obat Maag',
                        '11' => 'Obat Flu',
                        '12' => 'Antinyeri Topikal',
                        '13' => 'Obat Diare',
                        '14' => 'Obat Kulit',
                        '15' => 'Obat Gatal',
                        '16' => 'Obat Jerawat',
                        '17' => 'Obat Tetes',
                        '18' => 'Obat Herbal',
                        '19' => 'Obat Migrain',
                        '20' => 'Antifungal Krim',
                        default => 'Tidak Diketahui',
                    })
                    ->sortable()
                    ->searchable()
                    ->label('Jenis Produk'),
                TextColumn::make('descriptionProduct')
                    ->limit(25)
                    ->sortable()
                    ->searchable()
                    ->label('Deskripsi Produk'),
                TextColumn::make('harga')->money('idr')
                    ->sortable()
                    ->searchable()
                    ->label('Harga Produk'),
                TextColumn::make('expired')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->searchable()
                    ->label('Tanggal Kadaluarsa'),
                TextColumn::make('stok')
                    ->sortable()
                    ->searchable()
                    ->label('Stok Produk'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
