@extends('base')    

@section('title','Tambah Data Rekam Medis')

@section('assets')
<script
  src="{{ asset('js/jquery-3.3.1.min.js') }}">
  crossorigin="anonymous"
  </script>

<script>
    $(document).ready(function(){
        $.getJSON("{{ url('admin/spesialis') }}", function(result){
            $.each(result, function(i, item){
                $("<option>"+item.nama_spesialis+"</option>").attr('value', item.kode_spesialis).appendTo("#kd_spesialis");
            });
        });

        $("#kd_spesialis").change(function() {
            var id_dokter= $('option:selected', this).attr('value');
            $.getJSON("{{ url('admin/dokter') }}/"+id_dokter, function(result){
                $("#dokter").html($("<option>Pilih Dokter</option>").attr('value', ''));
                $.each(result, function(i, item){
                    $("<option>"+item.nama_dokter+" - "+item.hari+"</option>").attr('value', item.NIDN).appendTo("#nidn");
                });
            });
        });

        $.getJSON("{{ url('admin/pasien') }}", function(result){
            $.each(result, function(i, item){
                $("<option>"+item.nama_pasien+"</option>").attr('value', item.no_ktp).appendTo("#no_ktp");
            });
        });
    });
</script>
@endsection

@section('content')    
    <section class="hero is-light is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-6 is-offset-3">
                        <h3 class="title has-text-grey has-text-centered">Medic Record</h3>
                        <p class="subtitle has-text-grey has-text-centered">Tambah Data Rekam Medis</p>
    
                        <div class="box">
                            <form action="{{ url('admin/add') }}" method="post">
                            {{ csrf_field() }}
                                <div class="field">
                                    <label class="label">Tanggal</label>
                                    <div class="control">
                                    <input class="input" type="date" name="tgl_rm" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Spesialis</label>
                                    <div class="control">
                                        <div class="select">
                                            <select name="kd_spesialis" id="kd_spesialis">
                                                <option>Pilih Spesialis</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Nama Dokter</label>
                                    <div class="control">
                                        <div class="select">
                                            <select name="nidn" id="nidn">
                                                <option>Pilih Dokter</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label">Pasien</label>
                                    <div class="control">
                                        <div class="select">
                                            <select name="no_ktp" id="no_ktp" required>
                                                <option>Pilih Pasien</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="field">
                                    <label class="label">Keluhan</label>
                                    <div class="control">
                                    <textarea class="textarea" name="keluhan" id=""></textarea required>
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label">Pemeriksaan</label>
                                    <div class="control">
                                    <textarea class="textarea" name="pemeriksaan" id=""></textarea required>
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label">Diagnosa</label>
                                    <div class="control">
                                    <textarea class="textarea" name="diagnosa" id=""></textarea required>
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label">Resep</label>
                                    <div class="control">
                                    <textarea class="textarea" name="resep" id=""></textarea required>
                                    </div>
                                </div>
                                
                                <div class="control">
                                    <button class="button is-info is-medium" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </section>
@endsection