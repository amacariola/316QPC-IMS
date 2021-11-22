@extends('layouts.app')

@section('title', 'Create Adjustment')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('adjustments.index') }}">Product Requests</a></li>
    <li class="breadcrumb-item active">Add</li>
</ol>
@endsection

@section('content')
<div class="container-fluid mb-4">
    <div class="row">
        <div class="col-12">
            <livewire:search-product />
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('utils.alerts')
                    <form action="{{ route('adjustments.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="reference">Request Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="reference" required readonly value="{{ 'RN'.'-'.rand(0,99999) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="reference">Delivery Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="delivery_number" requiredx>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="from-group">
                                    <div class="form-group">
                                        <label for="date"> Request Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="date" required value="{{ now()->format('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="reference">Trust Receipt Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="trust_number" required>
                                </div>
                            </div>

                        </div>
                        <livewire:adjustment.product-table />
                        <div class="form-group">
                            <label for="note">Note (If Needed)</label>
                            <textarea name="note" id="note" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">
                                Create Request <i class="bi bi-check"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection