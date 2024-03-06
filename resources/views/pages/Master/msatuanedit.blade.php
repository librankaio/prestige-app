@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Master Data Satuan Edit</a></div>
        </div>
    </div>
    @php
        // $mbank_save = session('mbank_save');
        // $mbank_updt = session('mbank_updt');
        // $mbank_dlt = session('mbank_dlt');
    @endphp
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                @include('layouts.flash-message')
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Master Data Satuan Edit</h4>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <input type="text" class="form-control" name="satuan" id="satuan" value="{{ $msatuan->satuan }}">
                                    </div>                                                                                            
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">    
                            <button class="btn btn-primary mr-1" type="submit"
                            formaction="/msatuan/{{ $msatuan->id }}" id="confirm">Update</button>
                            <button class="btn btn-secondary" type="reset">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>            
        </div>
    </div>
</section>
@stop
@section('botscripts')
<script type="text/javascript">
    $('#datatable').DataTable({
        // "ordering":false,
        "bInfo" : false
    });

    $(".alert button.close").click(function (e) {
        $(this).parent().fadeOut(2000);
    });

    function submitDel(id){
        $('#del-'+id).submit()
    }
    $(document).on("click","#confirm",function(e){
        // Validate ifnull
        kode = $("#code").val();
        name = $("#name").val();
        initial = $("#initial").val();

        if (kode == ""){
            swal('WARNING', 'Kode Tidak boleh kosong!', 'warning');
            return false;
        }else if (name == ""){
            swal('WARNING', 'Nama Tidak boleh kosong!', 'warning');
            return false;
        }else if (initial == ""){
            swal('WARNING', 'Alamat Tidak boleh kosong!', 'warning');
            return false;
        }      

    });

    $("#initial").keyup(function(e){
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
        // if (/\D/g.test(this.value)){
        //     // Filter non-digits from input value.
        //     this.value = this.value.replace(/\D/g, '');
        // }
    });
</script>
@endsection