<?php

namespace App\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use WithPagination, WithFileUploads, LivewireAlert;
    public $input = [], $deleteId, $inputMode = 'create', $password, $password_confirmation;
    public $search;
    public $filter = [
        'search' => null,
        'role_id' => null,
        'status' => 'active',
    ];

    public function getListeners()
    {
        return [
            'delete' => 'delete',
        ];
    }

    #[Title('Daftar Pengguna')]

    public function render()
    {
        $roles = Role::where('status', 'active')
            // ->whereIn('id', [2, 3])
            ->whereNotIn('id', [1])
            ->get();
        $datas = User::search($this->search)
            ->whereNotIn('id', [1])
            ->paginate(10);

        return view('livewire.users.index', [
            'roles' => $roles,
            'datas' => $datas,
        ]);
    }

    function create()
    {
        $this->inputMode = 'create';
        $this->input = [];
        $this->password = '';
        $this->password_confirmation = '';
        $this->dispatch('openModal');
    }

    function edit($id)
    {
        $this->inputMode = 'edit';
        $data = User::findOrFail($id);
        $this->input = $data->toArray();
        $this->password = '';
        $this->password_confirmation = '';
        $this->dispatch('openModal');
    }

    function save()
    {
        if ($this->inputMode == 'create') {
            $this->validate([
                'input.name' => 'required|string|max:255',
                'input.username' => 'required|alpha_dash|unique:users,username|max:20',
                'input.role_id' => 'required',
                'password' => 'required|min:6|confirmed',
            ], [], [
                'input.name' => 'Nama',
                'input.username' => 'Username',
                'input.role_id' => 'Role',
                'password' => 'Password',
            ]);
            DB::beginTransaction();
            try {
                $data = new User;
                $data->name = $this->input['name'];
                $data->username = $this->input['username'];
                $data->email = $this->input['email'] ?? $this->input['username'] . '@email.com';
                $data->role_id = $this->input['role_id'];
                $data->password = bcrypt($this->password);
                $data->avatar = 'https://ui-avatars.com/api/?name=' . str()->slug($this->input['name']);
                $data->save();
                DB::commit();

                $this->dispatch('closeModal');
                $this->alert('success', 'Data berhasil disimpan');
                $this->input = [];
                $this->password = '';
                $this->password_confirmation = '';
            } catch (\Exception $e) {
                DB::rollback();
                $this->alert('error', $e->getMessage());
            }
        }

        if ($this->inputMode == 'edit') {
            $this->validate([
                'input.name' => 'required|string',
                // 'input.username' => 'required|alpha_dash|unique:users,username',
                'input.username' => 'required|alpha_dash|unique:users,username,' . $this->input['id'],
                'input.role_id' => 'required',
                'password' => 'nullable|min:6|confirmed',
            ], [], [
                'input.name' => 'Nama',
                'input.username' => 'Username',
                'input.role_id' => 'Role',
                'password' => 'Password',
            ]);
            DB::beginTransaction();
            try {
                $data = User::findOrFail($this->input['id']);
                $data->name = $this->input['name'];
                $data->username = $this->input['username'];
                $data->email = $this->input['email'] ?? $this->input['username'] . '@email.com';
                $data->role_id = $this->input['role_id'];
                $data->avatar = 'https://ui-avatars.com/api/?name=' . str()->slug($data->name);
                if ($this->password) {
                    $data->password = bcrypt($this->password);
                }
                $data->save();
                DB::commit();

                $this->dispatch('closeModal');
                // $this->dispatch('closeModal');
                $this->alert('success', 'Data berhasil disimpan');
                $this->input = [];
                $this->password = '';
                $this->password_confirmation = '';
            } catch (\Exception $e) {
                DB::rollback();
                $this->alert('error', $e->getMessage());
            }
        }
    }

    function setFilter()
    {
        $this->resetPage();
        $this->resetErrorBag();
        $this->dispatch('closeModal', 'modalFilter');
    }

    function delete()
    {
        DB::beginTransaction();
        try {
            $data = User::findOrFail($this->deleteId);
            $data->delete();
            DB::commit();
            $this->alert('success', 'Data berhasil dihapus');
            $this->deleteId = null;
        } catch (\Exception $e) {
            DB::rollback();
            $this->alert('error', $e->getMessage());
        }
    }

    function confirmDelete($id)
    {
        $this->confirm('Peringatan!', [
            'toast' => false,
            'position' => 'center',
            'confirmButtonText' => 'Ya, hapus!',
            'cancelButtonText' => 'Batal',
            'showCancelButton' => true,
            'onConfirmed' => 'delete',
            'text' => 'Apakah Anda yakin ingin menghapus data ini?',
        ]);
        $this->deleteId = $id;
    }
}
