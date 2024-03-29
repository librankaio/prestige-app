@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Master Data Customer Edit</a></div>
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
                        <h4>Master Data Customer Edit</h4>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input type="text" class="form-control" name="code" id="code" value="{{ $mcust->code }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ $mcust->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control select2" name="gender" id="gender">
                                            <option selected>{{ $mcust->jenis_kelamin }}</option>
                                            <option>Pria-punya selera</option>
                                            <option>Wanita</option>
                                        </select>
                                    </div>  
                                    <div class="form-group">
                                        <label>Phone #1</label>
                                        <input type="text" class="form-control" name="phone1" id="phone1" value="{{ $mcust->phone1 }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone #2</label>
                                        <input type="text" class="form-control" name="phone2" id="phone2" value="{{ $mcust->phone2 }}">
                                    </div>     
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" style="height:90px" name="alamat" id="alamat">{{ $mcust->alamat }}</textarea>
                                    </div>                               
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="{{ $mcust->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Social Media</label>
                                        <input type="text" class="form-control" name="socmed" id="socmed" value="{{ $mcust->socmed }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Rekening</label>
                                        <input type="text" class="form-control" name="rekening" id="rekening" value="{{ $mcust->rekening }}">
                                    </div>                                    
                                    <div class="form-group">
                                        <label>Note *ex:berkebutuhan ninja</label>
                                        <textarea class="form-control" style="height:90px" name="note" id="note">{{ $mcust->note }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">    
                            <button class="btn btn-primary mr-1" type="submit"
                            formaction="/mcust/{{ $mcust->id }}" id="confirm">Update</button>
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