<div class="row">
    <div class="panel panel-default col-md-6 col-md-offset-3">
        <div class="panel-body">
            <center><h2>Surat Ketetapan Pajak Daerah</h2>
                <h3>No SKPD: {{$skpd->id}}</h3></center>
            <br><br>
            <h4> Berdasarkan Surat Pemberitahuan Pajak Daerah yang telah dikirimkan pada tanggal
                XX-XX-XXXX maka ditetapkan besarnya pajak yang harus dibayar oleh NPWPD {{$skpd->pajakPbb->pajak->wajibPajak->npwpd}} adalah sebesar
                Rp. {{$skpd->biaya}} <br><br>
                Sekian. Terimakasih <br><br><br>
                Dinas Pajak Kota Bandung
            </h4>
        </div>
    </div>
</div>