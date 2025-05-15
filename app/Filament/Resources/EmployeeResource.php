<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Employee;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\EmployeeResource\Pages;
use Filament\Forms\Components\DatePicker;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('slug')->prefix('kry-')->required()->dehydrateStateUsing(fn($state) => str_starts_with($state, 'kry') ? $state : 'kry' . $state),
                TextInput::make('namaKaryawan')->autocapitalize()->required(),
                DatePicker::make('tglLahir')->required(),
                Select::make('shif')
                    ->options([
                        '1' => 'Pagi',
                        '2' => 'Siang',
                        '3' => 'Malam',
                    ])->required(),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('slug')->sortable()->searchable(isIndividual: true),
                TextColumn::make('namaKaryawan')->sortable()->searchable(),
                TextColumn::make('tglLahir')->label('Tanggal Lahir')->dateTime('l, d M Y')->sortable()->searchable(),
                TextColumn::make('shif')->formatStateUsing(fn($state) => match ($state) {
                    '1' => 'Pagi',
                    '2' => 'Siang',
                    '3' => 'Malam',
                    default => 'Tidak Diketahui',
                })->sortable()->searchable()

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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}