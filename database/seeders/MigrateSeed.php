<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MigrateSeed extends Seeder
{
    public function run(): void
    {
        $datas = Http::withHeaders([
            'x-api-key' => 'angga',
        ])->get('https://monitoring.oganilirkab.go.id/api/migrate/users', []);
        $datas = collect(json_decode($datas, true));
        $datas = $datas['data'];

        foreach ($datas as $data) {
            DB::table('users')->updateOrInsert([
                'id' => $data['id'],
            ], [
                'name' => $data['name'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'username' => $data['username'],
                'email' => $data['email'],
                'avatar' => $data['avatar'],
                'password' => $data['password'],
                'status' => $data['status'],
                'login_attempt' => $data['login_attempt'],
                'last_login_at' => $data['last_login_at'],
                'last_login_json' => $data['last_login_json'],
                'role_id' => $data['role_id'],
                'created_at' => $data['created_at'],
                'updated_at' => $data['updated_at'],
                'deleted_at' => $data['deleted_at'],
            ]);
        }

        $datas = Http::withHeaders([
            'x-api-key' => 'angga',
        ])->get('https://monitoring.oganilirkab.go.id/api/migrate/roles', []);
        $datas = collect(json_decode($datas, true));
        $datas = $datas['data'];

        foreach ($datas as $data) {
            DB::table('roles')->updateOrInsert([
                'id' => $data['id'],
            ], [
                'name' => $data['name'],
                'slug' => $data['slug'],
                'permissions' => $data['permissions'],
                'status' => $data['status'],
                'created_at' => $data['created_at'],
                'updated_at' => $data['updated_at'],
                'deleted_at' => $data['deleted_at'],
            ]);
        }

        $datas = Http::withHeaders([
            'x-api-key' => 'angga',
        ])->get('https://monitoring.oganilirkab.go.id/api/migrate/izin-sektoral', []);
        $datas = collect(json_decode($datas, true));
        $datas = $datas['data'];

        foreach ($datas as $data) {
            DB::table('data_izin_sektoral')->updateOrInsert([
                'id' => $data['id'],
            ], [
                'id_permohonan_izin' => $data['id_permohonan_izin'],
                'nib' => $data['nib'],
                'id_proyek' => $data['id_proyek'],
                'kbli' => $data['kbli'],
                'tanggal_izin' => $data['tanggal_izin'],
                'jenis_izin' => $data['jenis_izin'],
                'nama_dokumen' => $data['nama_dokumen'],
                'uraian_kewenangan' => $data['uraian_kewenangan'],
                'kewenangan' => $data['kewenangan'],
                'status_respon' => $data['status_respon'],
                'sektor' => $data['sektor'],

                'created_at' => $data['created_at'],
                'updated_at' => $data['updated_at'],
                'deleted_at' => $data['deleted_at'],
            ]);
        }

        $datas = Http::withHeaders([
            'x-api-key' => 'angga',
        ])->get('https://monitoring.oganilirkab.go.id/api/migrate/kbli', []);
        $datas = collect(json_decode($datas, true));
        $datas = $datas['data'];

        foreach ($datas as $data) {
            DB::table('data_kbli')->updateOrInsert([
                'id' => $data['id'],
            ], [
                'id_proyek' => $data['id_proyek'],
                'nib' => $data['nib'],
                'kbli' => $data['kbli'],
                'judul_kbli' => $data['judul_kbli'],
                'nama' => $data['nama'],
                'tanggal_terbit' => $data['tanggal_terbit'],
                'resiko' => $data['resiko'],
                'skala_usaha' => $data['skala_usaha'],
                'alamat' => $data['alamat'],
                'kecamatan' => $data['kecamatan'],
                'kelurahan' => $data['kelurahan'],
                'lng' => $data['lng'],
                'lat' => $data['lat'],
                'is_valid_coordinate' => $data['is_valid_coordinate'],
                'validation_coordinate_notes' => $data['validation_coordinate_notes'],
                'validation_lng' => $data['validation_lng'],
                'validation_lat' => $data['validation_lat'],
                'validation_date' => $data['validation_date'],
                'sektor_pembina' => $data['sektor_pembina'],
                'nama_user' => $data['nama_user'],
                'ktp_user' => $data['ktp_user'],
                'email_user' => $data['email_user'],
                'telp' => $data['telp'],
                'luas_lahan' => $data['luas_lahan'],
                'satuan_lahan' => $data['satuan_lahan'],
                'mesin_peralatan' => $data['mesin_peralatan'],
                'mesin_peralatan_impor' => $data['mesin_peralatan_impor'],
                'pembelian_pematangan_tanah' => $data['pembelian_pematangan_tanah'],
                'bangunan_gedung' => $data['bangunan_gedung'],
                'modal_kerja' => $data['modal_kerja'],
                'investasi_lainnya' => $data['investasi_lainnya'],
                'jumlah_investasi' => $data['jumlah_investasi'],
                'tenaga_kerja' => $data['tenaga_kerja'],

                'created_at' => $data['created_at'],
                'updated_at' => $data['updated_at'],
                'deleted_at' => $data['deleted_at'],
            ]);
        }

        $datas = Http::withHeaders([
            'x-api-key' => 'angga',
        ])->get('https://monitoring.oganilirkab.go.id/api/migrate/nib', []);

        $datas = collect(json_decode($datas, true));
        $datas = $datas['data'];

        foreach ($datas as $data) {
            DB::table('data_nib')->updateOrInsert([
                'id' => $data['id'],
            ], [
                'nib' => $data['nib'],
                'nama' => $data['nama'],
                'jenis_usaha' => $data['jenis_usaha'],
                'alamat' => $data['alamat'],
                'kabupaten' => $data['kabupaten'],
                'email' => $data['email'],
                'telp' => $data['telp'],
                'status_penanaman_modal' => $data['status_penanaman_modal'],
                'tanggal_terbit_oss' => $data['tanggal_terbit_oss'],

                'created_at' => $data['created_at'],
                'updated_at' => $data['updated_at'],
                'deleted_at' => $data['deleted_at'],
            ]);
        }
    }
}
