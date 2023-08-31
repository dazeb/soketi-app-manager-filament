<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApplicationResource\Pages;
use App\Models\Application;
use Filament\Resources\Resource;
use Filament\Support\Enums\IconPosition;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('App ID')
                    ->color('primary')
                    ->icon('heroicon-m-document-duplicate')
                    ->iconPosition(IconPosition::After)
                    ->sortable()
                    ->copyable(),
                TextColumn::make('name')
                    ->label('App Name')
                    ->sortable(),
                TextColumn::make('key')
                    ->label('App Key')
                    ->color('primary')
                    ->icon('heroicon-m-document-duplicate')
                    ->iconPosition(IconPosition::After)
                    ->copyable(),
                TextColumn::make('secret')
                    ->label('App Secret')
                    ->color('primary')
                    ->icon('heroicon-m-document-duplicate')
                    ->iconPosition(IconPosition::After)
                    ->copyable(),
                ToggleColumn::make('enabled')
                    ->label('Active Status')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                // Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListApplications::route('/'),
            'edit' => Pages\EditApplication::route('/{record}/edit'),
        ];
    }
}