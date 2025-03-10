<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model {

    protected $table = 'brands';
    protected $fillable = ['name'];

    public function allBrands(): Collection {
        return $this->all();
    }

    public function createBrand(string $name): bool {
        return (bool) $this->create(['name' => $name]);
    }

    public function findBrand(int $id): Brand|null {
        return $this->find($id);
    }

    public function editingBrand(string $name, int $id): int {
        return $this->where('id', $id)->update(['name' => $name]);
    }

    public function deleteBrand(int $id): int {
        return $this->destroy($id);
    }
}
