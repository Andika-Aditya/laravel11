<?php

namespace App\Filament\Resources;

use Dom\Text;
use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('slug')->prefix('obt-')->required()->unique()->dehydrateStateUsing(fn($state) => str_starts_with($state, 'obt') ? $state : 'obt' . $state),
                TextInput::make('titleProduct')->autocapitalize('words')->required(),
                TextInput::make('overview')->autocapitalize('words')->required(),
                FileUpload::make('imgProduct')->required(),
                Textarea::make('descriptionProduct')->rows(10)->cols(20)->required(),
                TextInput::make('harga')->numeric()->required(),
                DatePicker::make('expired')->required(),
                TextInput::make('stok')->numeric()->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('slug')->sortable()->searchable(isIndividual: true),
                TextColumn::make('titleProduct')->sortable()->searchable(),
                TextColumn::make('overview')->sortable()->searchable(),
                TextColumn::make('descriptionProduct')->limit(25)->sortable()->searchable(),
                TextColumn::make('harga')->money('idr')->sortable()->searchable(),
                TextColumn::make('expired')->dateTime('d M Y')->sortable()->searchable(),
                TextColumn::make('stok')->sortable()->searchable()
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}