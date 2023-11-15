@extends('layouts.app')
@section('page_big_title', 'Dataset')
@section('page_title', 'Dataset')
@section('page_sub_title', 'Dataset')
@section('content')

    <div class="py-5" x-data="datasetData">
        <div class="mb-4">
            <button type="button"  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-create">
                Tambah
            </button>
            @include('pages.dataset.components.modal.create')
            @include('pages.dataset.components.modal.edit')
        </div>
        <table class="table table-row-dashed table-row-gray-300 gy-7">
            <thead>
            <tr class="fw-bolder fs-6 text-gray-800">
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Pendapatan Orangtua</th>
                <th>Jumlah Tanggungan</th>
                <th>Jumlah Prestasi</th>
                <th>Rata Rata Nilai Raport</th>
                <th>Nilai Essay</th>
                <th>Inferensi</th>
                <td>Aksi</td>
            </tr>
            </thead>
            <tbody>
            <template x-if="!isLoading && dataset?.data.length === 0">
                <tr>

                    <td colspan="7">
                        <center>
                            Data Tidak Ditemukan
                        </center>
                    </td>
                </tr>
            </template>
            <template x-if="isLoading">
                <tr>
                    <td colspan="7">
                        <center>
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </center>
                    </td>
                </tr>
            </template>
            <template x-for="(row,index) in dataset?.data" :key="row.id">
                <tr>
                    <td x-text="startIndex + index++"></td>
                    <td x-text="row.user.name"></td>
                    <td x-text="rupiah(row.pendapatan_ortu)"></td>
                    <td x-text="row.tanggungan_ortu"></td>
                    <td x-text="row.jumlah_prestasi"></td>
                    <td x-text="row.nilai_raport"></td>
                    <td x-text="row.nilai_essay"></td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" @click="inferensi(row.id)">
                            Inferensi
                        </button>
                    </td>
                    <td>
                        <button type="button" @click="edit(row.id)"  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit">
                            <i class="bi bi-pencil-fill"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" @click="destroy(row.id)">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            </template>
            </tbody>
        </table>
        <div class="float-end">
            <ul class="pagination">
                <li class="page-item previous disabled">
                    <button type="button" @click="PrevPage" class="btn btn-light btn-sm text-black">Previous</button>
                </li>
                <li class="page-item next">
                    <button type="button" @click="nextPage()" class="btn btn-light btn-sm text-black">Next</button>
                </li>
            </ul>
        </div>
    </div>
@endsection
@push('js')
    @include('pages.dataset.script')
@endpush
