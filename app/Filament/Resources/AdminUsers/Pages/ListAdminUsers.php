<?php

namespace App\Filament\Resources\AdminUsers\Pages;

use App\Filament\Resources\AdminUsers\AdminUserResource;
use Filament\Resources\Pages\ListRecords;

class ListAdminUsers extends ListRecords
{
    protected static string $resource = AdminUserResource::class;

    public function mount(): void
    {
        parent::mount();

        $id = auth()->id();
        if ($id) {
            $this->redirect(AdminUserResource::getUrl('edit', ['record' => $id]));
        }
    }

    protected function getHeaderActions(): array
    {
        return []; // ✅ بدون Create
    }
}