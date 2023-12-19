<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                    ->autofocus()
                    ->required()
                    ->max(255)
                    ->placeholder(__('First Name')),
                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->max(255)
                    ->placeholder(__('Last Name')),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->max(255)
                    ->placeholder(__('Email')),
                Forms\Components\TextInput::make('phone_number')
                    ->required()
                    ->max(255)
                    ->placeholder(__('Phone Number')),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->max(255)
                    ->placeholder(__('Address')),
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->max(255)
                    ->placeholder(__('City')),
                Forms\Components\TextInput::make('postal_code')
                    ->required()
                    ->max(255)
                    ->placeholder(__('Postal Code')),
                Forms\Components\TextInput::make('country')
                    ->required()
                    ->max(255)
                    ->placeholder(__('Country')),
                Forms\Components\TextInput::make('expiration_date')
                    ->required()
                    ->max(255)
                    ->placeholder(__('Expiration Date')),
                Forms\Components\TextInput::make('card_number')
                    ->required()
                    ->max(255)
                    ->placeholder(__('Card Number')),
                Forms\Components\TextInput::make('security_code')
                    ->required()
                    ->max(255)
                    ->placeholder(__('Security Code')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('postal_code')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('expiration_date')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('card_number')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('security_code')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
