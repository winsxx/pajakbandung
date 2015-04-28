<div class="row">
    <div class="panel panel-default col-md-6 col-md-offset-3">
        <div class="panel-body">
            <center><h2>Surat Ketetapan Pajak Daerah Kurang Bayar</h2>
                <h3>No Pajak: {{$sptpd->pajak->id}}</h3></center>
            <br><br>
            <h4> Bersama surat ini kami beritahukan bahwa anda belum membayar pajak terutang sebesar {{$sptpd->nilai_skpd}}
                pada periode bulan {{$sptpd->sptpdLengkap()->bulan}} tahun {{$sptpd->sptpdLengkap()->tahun}}.  <br><br>
                Sekian. Terimakasih <br><br><br>
                Dinas Pajak Kota Bandung
            </h4>
        </div>
    </div>
</div>