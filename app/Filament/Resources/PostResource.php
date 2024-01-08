<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use FilamentCurator\Forms\Components\MediaPicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('title'),
                TextEntry::make('slug'),
                ImageEntry::make('featured_image.path'),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required(),
                CuratorPicker::make('featured_image_id')
                    ->relationship('featured_image', 'id'),
                CuratorPicker::make('product_images')
                    ->directory('product-images')
                    ->multiple(),
                CuratorPicker::make('product_picture_ids')
                    ->directory('product-pictures')
                    ->columnSpanFull()
                    ->multiple()
                    ->lazyLoad()
                    ->listDisplay()
                    ->relationship('product_pictures', 'id'),
                Forms\Components\Repeater::make('products')
                    ->columnSpanFull()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->required(),
                        CuratorPicker::make('image')
                            ->directory('products')
                            ->lazyLoad(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                CuratorColumn::make('featured_image')
                    ->alignCenter()
                    ->size(32)
                    ->circular(),
                CuratorColumn::make('product_pictures')
                    ->size(32)
                    ->circular(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
