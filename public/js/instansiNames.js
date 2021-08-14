$(document).ready(function(){
    $("#badan").change(function() {
        var val = $(this).val();
        if (val == "01") {
            $("#instansi").html(`
                <option value='101' id='101'>Bagian Umum</option>
                <option value='102' id='102'>Bagian Protokol</option>
                <option value='103' id='103'>Bagian Hukum</option>
                <option value='104' id='104'>Bagian Organisasi</option>
                <option value='105' id='105'>Bagian Tata Pemerintahan Umum</option>
                <option value='106' id='106'>Bagian Unit Kerja Pemerintah Barang dan Jasa</option>
                <option value='107' id='107'>Bagian Ekonomi dan Pembangunan</option>
                <option value='108' id='108'>Bagian Kesejateraan Rakyat</option>
            `);
        } else if (val == "02") {
            $("#instansi").html(`
                <option value='201' id='201'>Sekretariat DPRD</option>
            `);

        } else if (val == "03") {
            $("#instansi").html(`
            <option value='301' id='301'>Sekretariat DPRD</option>
            `);
        } else if(val == "04") {
            $("#instansi").html(`
                <option value='401' id='401'>Dinas Komunikasi dan Informatika</option>
                <option value='402' id='402'>Dinas Kesehatan</option>
                <option value='403' id='403'>Dinas Penanaman modal dan pelayanan perizinan terpadu satu pintu (DPMP2TSP)</option>
                <option value='404' id='404'>Dinas Sosial	</option>
                <option value='405' id='405'>Dinas Perkim</option>
                <option value='406' id='406'>Dinas Pendidikan</option>
                <option value='407' id='407'>Dinas Peternakan dan Perikanan</option>
                <option value='408' id='408'>Dinas Kependudukan dan catatan Sipil</option>
                <option value='409' id='409'>Dinas Sekretariat Dewan</option>
                <option value='410' id='410'>Dinas Pemberdayaan Mas. Desa, Perempuan dan Perlindungan Anak (DPMDP2A)</option>
                <option value='411' id='411'>Dinas Ketahanan Pangan</option>
                <option value='412' id='412'>Dinas Lingkungan Hidup	</option>
                <option value='413' id='413'>Dinas Pariwisata</option>
                <option value='414' id='414'>Dinas Pekerjaan Umum Penataan Ruang</option>
                <option value='415' id='415'>Dinas Pertanian</option>
                <option value='416' id='416'>Dinas Kepemudaan dan Olahraga</option>
                <option value='417' id='417'>Dinas Pengelolaan penduduk dan Keluarga Berencana (DP2KB)</option>
                <option value='418' id='418'>Dinas Koperasi, Perdagangan dan Industri</option>
                <option value='419' id='419'>Satuan Pol PP</option>
                <option value='420' id='420'>Dinas Tenaga Kerja</option>
                <option value='421' id='421'>Dinas Perhubungan</option>
                <option value='422' id='422'>Inspektorat</option>
                <option value='423' id='423'>Dinas Perpustakaan dan Kearsipan</option>
                <option value='424' id='424'>RSUD DolokSanggul</option>
            `);
        }
    });


});
