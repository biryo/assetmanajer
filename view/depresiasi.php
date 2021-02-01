<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy'
        });
    });

    function format_date(date) {
        var data = date.split("-");
        var dateshow = data[2] + '-' + data[1] + '-' + data[0];
        return dateshow;
    }

    function dpicker() {
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy'
        });
    }

    function hint() {
        $('input#typeahead').typeahead({
            name: 'typeahead',
            remote: '?page=list-asset&key=%QUERY',
            limit: 10
        });
    }

    function auto_decimal() {
        $('input#dt_discount').change(function () {
            var s = $(this).val();
            if (s.includes("%")) {
                //do nothing
            } else {
                var tride = $(this).closest('tr').attr('id');
                if (s.includes(".")) {
                    var angka = convertToAngka(s);
                } else {
                    var angka = s;
                }
                var desimal = convertToRupiah(angka);
                $('input:text').parents('tr#' + tride).find('#dt_discount').val(desimal);
            }
        });
        $('input#tot_tax').change(function () {
            var s = $(this).val();
            if (s.includes("%")) {
                //do nothing
            } else {
                var tride = $(this).closest('tr').attr('id');
                if (s.includes(".")) {
                    var angka = convertToAngka(s);
                } else {
                    var angka = s;
                }
                var desimal = convertToRupiah(angka);
                $('input#tot_tax').val(desimal);
            }
        });
        $('input#dk_Price').change(function () {
            var tride = $(this).closest('tr').attr('id');
            var s = $(this).val();
            if (s.includes(".")) {
                var angka = convertToAngka(s);
            } else {
                var angka = s;
            }
            var desimal = convertToRupiah(angka);
            $('input:text').parents('tr#' + tride).find('#dk_Price').val(desimal);
        });
        $('input#bayar').change(function () {
            var s = $(this).val();
            if (s.includes(".")) {
                var angka = convertToAngka(s);
            } else {
                var angka = s;
            }
            var desimal = convertToRupiah(angka);
            $('input#bayar').val(desimal);
        });
    }

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0)
                rupiah += angkarev.substr(i, 3) + '.';
        return rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function convertToAngka(rupiah) {
        return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
    }
    
    function find_asset() {
        $('input#typeahead').focusin(function() {
            var trid = $(this).closest('tr').attr('id');
            $.ajax({
                type: 'post',
                url: '?page=get-data-asset',
                data: 'q=' + $(this).val(),
                success: function (value) {
                    var data = value.split("::");
                    var ns = data[0];
                    var nama = data[1];
                    var nilai = convertToRupiah(data[2]);
                    var jenis = data[3];
                    var merk = data[4];
                    var tp = data[5];
                    var spek = data[6];
                    var tgl = data[7];
                    $("input").parents('tr#' + trid).find('#jenis').val(jenis);
                    $("input").parents('tr#' + trid).find('#merk').val(merk);
                    $("input").parents('tr#' + trid).find('#nilai').val(nilai);
                    $("input").parents('tr#' + trid).find('#tgl').val(tgl);
                }
            });
        });
    }
    
    function calculate_depresiasi() {
        $('#btn-result').click(function () {
            $("#depresiasi").html("");
            $('.typeahead').each(function () {
                var trid = $(this).closest('tr').attr('id');
                var asset = $("input").parents('tr#' + trid).find('#typeahead').val();
                var nilai = convertToAngka($("input").parents('tr#' + trid).find('#nilai').val());
                var tgl = $("input").parents('tr#' + trid).find('#tgl').val();
                var id = asset + "," + nilai + "," + tgl;
                if(asset && nilai){
                    $.ajax({
                        type: 'post',
                        url: '?page=calculate-depresiasi',
                        data: 'q=' + id,
                        success: function (value) {
                            var data = value.split("::");
                            var depresiasi = data[0];
                            $("#depresiasi").append(depresiasi);
                        }
                    });
                }
            });
        });
    }

    $(document).ready(function () {
        var i = 3;
        var x = 2;
        
        hint();
        
        find_asset();
        
        calculate_depresiasi();
        
        $('#add').click(function () {

            i++;

            $('#dynamic_field').append('<tr id="row' + i + '" class="dt_row" name="line_items"><td><div class="form-group"><input name="id[]" id="typeahead" type="text" class="form-control typeahead" autocomplete="off" spellcheck="false" placeholder="Masukan Nama Asset"></div></td><td><div class="form-group"><input type="text" name="a[]" id="jenis" class="form-control" readonly=""></div></td><td><div class="form-group"><input type="text" name="b[]" id="merk" class="form-control" readonly=""></div></td><td><div class="form-group"><input type="text" name="c[]" id="nilai" class="form-control" readonly=""></div></td><td><div class="form-group"><input type="text" name="d[]" id="tgl" class="form-control" readonly=""></div></td>\<td><div class="form-group"><input type="text" name="d[]" id="pajak" class="form-control" value="25%"  readonly=""></div></td><td><button id="' + i + '" type="button" class="btn btn-danger btn_remove">X</button></td></tr>');

            hint();
            
            find_asset();
            
        });

        $(document).on('click', '.btn_remove', function () {

            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();

        });
    });
</script>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Depresiasi Asset
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <form  id="cart" method="POST" action="#">
            <div class="row">
                <div class="col-xs-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover"  name="cart">
                                    <tr>
                                        <th>Nama Asset</th>
                                        <th>Jenis Asset</th>
                                        <th>Merk Asset</th>
                                        <th>Nilai Asset(Rp.)</th>
                                        <th>Tanggal Peroleh</th>
                                        <th>Tarif Pajak (Per Tahun)</th>
                                        <th></th>
                                    </tr>
                                    <tbody>
                                        <tr id="row" class="dt_row" name="line_items">
                                            <td><div class="form-group"><input name="id[]" id="typeahead" type="text" class="form-control typeahead" autocomplete="off" spellcheck="false" placeholder="Masukan Nama Asset" autofocus=""></div></td>
                                            <td><div class="form-group"><input type="text" name="a[]" id="jenis" class="form-control" readonly=""></div></td>
                                            <td><div class="form-group"><input type="text" name="b[]" id="merk" class="form-control" readonly=""></div></td>
                                            <td><div class="form-group"><input type="text" name="c[]" id="nilai" class="form-control" readonly=""></div></td>
                                            <td><div class="form-group"><input type="text" name="d[]" id="tgl" class="form-control" readonly=""></div></td>
                                            <td><div class="form-group"><input type="text" name="d[]" id="pajak" class="form-control" value="25%" readonly=""></div></td>
                                            <td></td>
                                        </tr>
                                        <tr id="row1" class="dt_row" name="line_items">
                                            <td><div class="form-group"><input name="id[]" id="typeahead" type="text" class="form-control typeahead" autocomplete="off" spellcheck="false" placeholder="Masukan Nama Asset" autofocus=""></div></td>
                                            <td><div class="form-group"><input type="text" name="a[]" id="jenis" class="form-control" readonly=""></div></td>
                                            <td><div class="form-group"><input type="text" name="b[]" id="merk" class="form-control" readonly=""></div></td>
                                            <td><div class="form-group"><input type="text" name="c[]" id="nilai" class="form-control" readonly=""></div></td>
                                            <td><div class="form-group"><input type="text" name="d[]" id="tgl" class="form-control" readonly=""></div></td>
                                            <td><div class="form-group"><input type="text" name="d[]" id="pajak" class="form-control" value="25%" readonly=""></div></td>
                                            <td><button id="1" type="button" class="btn btn-danger btn_remove">X</button></td>
                                        </tr>
                                        <tr id="row2" class="dt_row" name="line_items">
                                            <td><div class="form-group"><input name="id[]" id="typeahead" type="text" class="form-control typeahead" autocomplete="off" spellcheck="false" placeholder="Masukan Nama Asset" autofocus=""></div></td>
                                            <td><div class="form-group"><input type="text" name="a[]" id="jenis" class="form-control" readonly=""></div></td>
                                            <td><div class="form-group"><input type="text" name="b[]" id="merk" class="form-control" readonly=""></div></td>
                                            <td><div class="form-group"><input type="text" name="c[]" id="nilai" class="form-control" readonly=""></div></td>
                                            <td><div class="form-group"><input type="text" name="d[]" id="tgl" class="form-control" readonly=""></div></td>
                                            <td><div class="form-group"><input type="text" name="d[]" id="pajak" class="form-control" value="25%" readonly=""></div></td>
                                            <td><button id="2" type="button" class="btn btn-danger btn_remove">X</button></td>
                                        </tr>
                                    </tbody>
                                    <tbody id="dynamic_field"></tbody>
                                    <tbody>
                                        <tr>
                                            <th><button type="button" class="btn btn-primary" id="add"><i class="fa fa-plus-square"></i></button></th>
                                            <th colspan="5"></th><th><hr></hr></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" id="btn-result" class="btn btn-lg btn-block btn-warning"><i class="fa fa-laptop"></i> Lihat Hasil</button>
                                <button type="button" class="btn btn-lg btn-block btn-default" onclick="document.location.href='?page=depresiasi'"><i class="fa fa-undo"></i> Reset</button>
                            </div>
                        </div><!-- /.box -->
                    </div>
                </div>
                <div id="depresiasi">
                    
                </div>
            </div>
        </form>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->