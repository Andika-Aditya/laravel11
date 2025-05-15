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

use PhpParser\Node\Stmt\Label;
use function Livewire\on;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Data Pegawai';

    protected static ?string $slug = 'data-pegawai';

    protected static ?string $navigationGroup = 'Kelola Data';

    public static ?string $label = 'Data Pegawai';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('slug')
                    ->integer()
                    ->prefix('kry')
                    ->required()
                    ->label('Kode Karyawan')
                    ->placeholder('000')
                    ->minLength(3)
                    ->maxLength(3)
                    ->dehydrateStateUsing(fn($state) => str_starts_with($state, 'kry') ? $state : 'kry' . $state),
                TextInput::make('namaKaryawan')
                    ->autocapitalize()->required()
                    ->placeholder('Masukkan Nama Karyawan')
                    ->minLength(2)
                    ->maxLength(255),
                DatePicker::make('tglLahir')
                    ->required(),
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
                TextColumn::make('slug')
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('Kode Karyawan'),
                TextColumn::make('namaKaryawan')
                    ->sortable()
                    ->searchable()
                    ->label('Nama Karyawan'),
                TextColumn::make('tglLahir')
                    ->dateTime('l, d M Y')
                    ->sortable()
                    ->searchable()
                    ->label('Tanggal Lahir'),
                TextColumn::make('shif')
                    ->formatStateUsing(fn($state) => match ($state) {
                        '1' => 'Pagi',
                        '2' => 'Siang',
                        '3' => 'Malam',
                        default => 'Tidak Diketahui',
                    })
                    ->sortable()
                    ->searchable()
                    ->Label('Shift'),

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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
