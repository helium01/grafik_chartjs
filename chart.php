$gelombang = Gelombang::orderBy('tanggal', 'asc')->get();
            $tanggal=[];
            foreach($gelombang as $g){
                $tanggal[]=$g->tanggal;
            }
            $gelombang1 = peramalan_ho_ts::orderBy('tanggal', 'asc')->get();
            $tinggi_gelombang=[];
            $prediksi_hots=[];
            foreach($gelombang1 as $gg){
                $tinggi_gelombang[]=$gg->gelombang;
            $prediksi_hots[]=$gg->prediksi;
            }
            $gelombang2 = peramalan_ts_lee::orderBy('tanggal', 'asc')->get();
            $prediksi_tslee=[];
            foreach($gelombang2 as $ggg){
                $prediksi_tslee[]=$ggg->prediksi;
            }
            $data_array = [];
            // dd(count($tanggal));
            for ($i = 0; $i < count($tanggal); $i++) {
                $data_array[] = [
                    'tanggal' => $tanggal[$i],
                    'gelombang_real'=>$tinggi_gelombang[$i],
                    'prediksi_hots' => $prediksi_hots[$i],
                    'prediksi_tslee' => $prediksi_tslee[$i]
            ];}
