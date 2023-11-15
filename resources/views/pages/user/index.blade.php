@extends('layouts.app')
@section('page_big_title', 'Data User')
@section('page_title', 'Data User')
@section('page_sub_title', 'Data User')
@section('content')

    <div class="py-5" x-data="userData">
        <div class="mb-4">
            <button type="button"  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-create">
                Tambah
            </button>
            @include('pages.user.components.modal.create')
            @include('pages.user.components.modal.edit')
        </div>
        <table class="table table-row-dashed table-row-gray-300 gy-7">
            <thead>
            <tr class="fw-bolder fs-6 text-gray-800">
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <td>Aksi</td>
            </tr>
            </thead>
            <tbody>
            <template x-if="!isLoading && users?.data.length === 0">
                <tr>
                    <td colspan="4">
                       Data Tidak Ditemukan
                    </td>
                </tr>
            </template>
            <template x-if="isLoading">
                <tr>
                    <td colspan="4">
                        <center>
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        </center>
                    </td>
                </tr>
            </template>
                <template x-for="(row,index) in users?.data" :key="row.id">
            <tr>
                <td x-text="startIndex + index++"></td>
                <td x-text="row.name"></td>
                <td x-text="row.email"></td>
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
    @include('pages.user.script')
@endpush
