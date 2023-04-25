<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('order_number')
                ->required(),
                Forms\Components\Select::make('status')
                    ->options(['pending','processing','completed','decline']),
                Forms\Components\TextInput::make('grand_total')
                    ->required(),
                Forms\Components\TextInput::make('item_count')
                    ->required(),
                Forms\Components\Toggle::make('is_paid')
                    ->default(false),
                Forms\Components\Select::make('payment_method')
                    ->options(['cash_on_delivery','card','paypal','stripe']),
                Forms\Components\TextInput::make('shipping_full_name'),
                Forms\Components\TextInput::make('shipping_address'),
                Forms\Components\TextInput::make('shipping_city'),
                Forms\Components\TextInput::make('shipping_state'),
                Forms\Components\TextInput::make('shipping_zipcode'),
                Forms\Components\TextInput::make('shipping_phone'),


                Forms\Components\TextInput::make('billing_full_name'),
                Forms\Components\TextInput::make('billing_address'),
                Forms\Components\TextInput::make('billing_city'),
                Forms\Components\TextInput::make('billing_state'),
                Forms\Components\TextInput::make('billing_zipcode'),
                Forms\Components\TextInput::make('billing_phone'),
                Forms\Components\TextInput::make('notes')->nullable(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_number'),
                Tables\Columns\SelectColumn::make('status')
                    ->options(['pending','processing','completed','decline'])
                    ->disablePlaceholderSelection(),
                Tables\Columns\TextColumn::make('grand_total'),
                Tables\Columns\TextColumn::make('item_count'),
                Tables\Columns\ToggleColumn::make('is_paid')
                    ->default(false),
                Tables\Columns\SelectColumn::make('payment_method')
                    ->options(['cash_on_delivery','card','paypal','stripe'])
                    ->disablePlaceholderSelection(),
                Tables\Columns\TextColumn::make('shipping_full_name'),
                Tables\Columns\TextColumn::make('shipping_address'),
                Tables\Columns\TextColumn::make('shipping_city'),
                Tables\Columns\TextColumn::make('shipping_state'),
                Tables\Columns\TextColumn::make('shipping_zipcode'),
                Tables\Columns\TextColumn::make('shipping_phone'),
                Tables\Columns\TextColumn::make('notes'),

                Tables\Columns\TextColumn::make('billing_full_name'),
                Tables\Columns\TextColumn::make('billing_address'),
                Tables\Columns\TextColumn::make('billing_city'),
                Tables\Columns\TextColumn::make('billing_state'),
                Tables\Columns\TextColumn::make('billing_zipcode'),
                Tables\Columns\TextColumn::make('billing_phone'),
                TextColumn::make('user.name')


            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
