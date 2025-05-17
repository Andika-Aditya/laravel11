<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use Filament\Forms\Components\TextInput;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Kelola Data';
    protected static ?string $navigationLabel = 'Data Pengguna';
    protected static ?string $slug = 'data-pengguna';

    public static ?string $label = 'Data Pengguna';

    protected ?string $heading = 'Custom Page Heading';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                    ->required()
                    ->placeholder('Masukkan Nama Pengguna')
                    ->label('Nama Pengguna')
                    ->minLength(2)
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique()
                    ->placeholder('abcd@admin.com')
                    ->label('Email Pengguna')
                    ->length(200),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->revealable()
                    ->placeholder('Masukkan Kata Sandi Anda')
                    ->label('Kata Sandi')
                    ->length(50),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('Nama Pengguna'),
                TextColumn::make('email')
                    ->sortable()
                    ->searchable()
                    ->label('Email Pengguna'),
            ])->emptyStateHeading('Tidak Adad Data Pengguna')->emptyStateIcon('heroicon-o-user-group')
            ->filters([
                //
                Tables\Filters\TrashedFilter::make(),
            ])
            ->defaultSort('id', 'asc')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}