<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SiswaIPS;
use App\TrainingIPS;
use App\TestingIPS;

use Session;
use DB;

use App\Imports\SiswaIPSImport;
use App\Exports\SiswaIPSExport;
use App\Exports\TrainingIPSExport;
use App\Exports\TestingIPSExport;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class SiswaIPSController extends Controller{

	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function index(){
    	$siswaIPS = SiswaIPS::paginate(10);
    	$hitung = SiswaIPS::count();
    	if ($hitung > 0) {
    		Session::flash('ada');
    	}
    	return view('IPS.indexIPS',compact('siswaIPS'));
    }

    public function cari(Request $request){
    	$field = $request->field;
    	$dataCari = $request->cari;
    	$hitung = SiswaIPS::count();
    	if ($hitung > 0) {
    		Session::flash('ada');
    	}
    	$siswaIPS = SiswaIPS::where($field,'like',"%".$dataCari."%")->paginate();
    	$siswaIPS->appends($request->only('field','cari'));

    	return view('IPS.indexIPS',compact('siswaIPS'));
    }

    public function formatFile(){
    	return Storage::disk('public')->download('dataIPS.xlsx');
    }

	public function import(){	
		try{
			$siswaArray = Excel::toArray(New SiswaIPSImport, request()->file('file'));
			foreach ($siswaArray[0] as $key => $value) {
				if ($value['status'] == "LULUS") {
					$siswa = SiswaIPS::firstOrNew(array('nisn' => $value['nisn'],'nama' => $value['nama'],'angkatan' => $value['angkatan'],'ind1' => $value['ind1'],'ind2' => $value['ind2'],'ind3' => $value['ind3'],'ind4' => $value['ind4'], 'ind5' => $value['ind5'], 'ing1' => $value['ing1'], 'ing2' => $value['ing2'], 'ing3' => $value['ing3'], 'ing4' => $value['ing4'], 'ing5' => $value['ing5'],'mat1' => $value['mat1'], 'mat2' => $value['mat2'], 'mat3' => $value['mat3'], 'mat4' => $value['mat4'], 'mat5' => $value['mat5'], 'geo1' => $value['geo1'], 'geo2' => $value['geo2'], 'geo3' => $value['geo3'], 'geo4' => $value['geo4'],'geo5' => $value['geo5'], 'eko1' => $value['eko1'], 'eko2' => $value['eko2'], 'eko3' => $value['eko3'], 'eko4' => $value['eko4'],'eko5' => $value['eko5'], 'sos1' => $value['sos1'], 'sos2' => $value['sos2'], 'sos3' => $value['sos3'], 'sos4' => $value['sos4'],'sos5' => $value['sos5'], 'ptn' => $value['ptn'],'jurusan' => $value['jurusan'],'status' => $value['status']));
					$siswa->save();
				} 
			}
			Session::flash('berhasil','Data Siswa Berhasil Diunggah!');
			$this->memasukanData($siswaArray);
		} catch(\Exception $e) {
			Session::flash('gagal','Data Siswa Gagal Diunggah!, Cek file apakah sesuai dengan format');
		} catch(\Error $e) {
			Session::flash('gagal','Data Siswa Gagal Diunggah!, Cek file apakah sesuai dengan format');
		}		
		return redirect()->route('indexIPS');
	}

	public function delete_all(){
		SiswaIPS::truncate();
		TrainingIPS::truncate();
		TestingIPS::truncate();
		return redirect()->route('indexIPS');
	}

	public function memasukanData($siswaArray){
		$pelajaran = array('ind', 'ing', 'mat', 'geo', 'eko', 'sos');
		$semester = array(1, 2, 3, 4, 5);
		$tahun = date("Y")-1;
		$tanggal = date("d-m-Y");
		foreach ($siswaArray[0] as $key => $value) {
			foreach ($pelajaran as $p) {
				foreach($semester as $s) { 
					$namaPelajaran = $p.$s;
					if ($value[$namaPelajaran] >= 90) {
						$value[$namaPelajaran] = "SANGAT_BAIK";
					} elseif ($value[$namaPelajaran] >= 80) {
						$value[$namaPelajaran] = "BAIK";
					} else {
						$value[$namaPelajaran] = "CUKUP";
					}
				}
			}
			if ($value['angkatan'] == $tahun) {
				$dataTesting[] = array('ind1' => $value['ind1'],'ind2' => $value['ind2'],'ind3' => $value['ind3'],'ind4' => $value['ind4'], 'ind5' => $value['ind5'], 'ing1' => $value['ing1'], 'ing2' => $value['ing2'], 'ing3' => $value['ing3'], 'ing4' => $value['ing4'], 'ing5' => $value['ing5'],'mat1' => $value['mat1'], 'mat2' => $value['mat2'], 'mat3' => $value['mat3'], 'mat4' => $value['mat4'], 'mat5' => $value['mat5'], 'geo1' => $value['geo1'], 'geo2' => $value['geo2'], 'geo3' => $value['geo3'], 'geo4' => $value['geo4'],'geo5' => $value['geo5'], 'eko1' => $value['eko1'], 'eko2' => $value['eko2'], 'eko3' => $value['eko3'], 'eko4' => $value['eko4'],'eko5' => $value['eko5'], 'sos1' => $value['sos1'], 'sos2' => $value['sos2'], 'sos3' => $value['sos3'], 'sos4' => $value['sos4'],'sos5' => $value['sos5'], 'status' => $value['status']
				);
			} else {
				$dataTraining[] = array('ind1' => $value['ind1'],'ind2' => $value['ind2'],'ind3' => $value['ind3'],'ind4' => $value['ind4'], 'ind5' => $value['ind5'], 'ing1' => $value['ing1'], 'ing2' => $value['ing2'], 'ing3' => $value['ing3'], 'ing4' => $value['ing4'], 'ing5' => $value['ing5'],'mat1' => $value['mat1'], 'mat2' => $value['mat2'], 'mat3' => $value['mat3'], 'mat4' => $value['mat4'], 'mat5' => $value['mat5'], 'geo1' => $value['geo1'], 'geo2' => $value['geo2'], 'geo3' => $value['geo3'], 'geo4' => $value['geo4'],'geo5' => $value['geo5'], 'eko1' => $value['eko1'], 'eko2' => $value['eko2'], 'eko3' => $value['eko3'], 'eko4' => $value['eko4'],'eko5' => $value['eko5'], 'sos1' => $value['sos1'], 'sos2' => $value['sos2'], 'sos3' => $value['sos3'], 'sos4' => $value['sos4'],'sos5' => $value['sos5'], 'status' => $value['status']
				);
			}
		}
		//mengecek table apakah kosong atau tidak, jika kosong hapus
		$checkRowTrain = TrainingIPS::count();
		$checkRowTesting = TestingIPS::count();
		if ($checkRowTrain > 0) {
			TrainingIPS::truncate();
		} 
		if ($checkRowTesting > 0) {
			TestingIPS::truncate();
		}
		//memasukan data array dataTraining ke table training IPS
		TrainingIPS::insert($dataTraining);
		//membuat file csv dari data training
		$this->createCSV('train','data'.'-'.$tanggal.'-'.'TrainIPS'.'.csv');
		//membuat file arff dari file csv
		$this->trainingToArff(sizeof($dataTraining),'data'.'-'.$tanggal.'-'.'TrainIPS');
		//memasukan data array dataTesting ke table testing IPS
		TestingIPS::insert($dataTesting);
		//membuat file csv dari data training
		$this->createCSV('test','data'.'-'.$tanggal.'-'.'TestIPS'.'.csv');
		//membuat file arff dari file csv
		$this->testingToArff(sizeof($dataTesting),'data'.'-'.$tanggal.'-'.'TestIPS');
		//membuat model dari file arff
		$this->arffToModel('data'.'-'.$tanggal.'-'.'TrainIPS');
	}

	public function createCSV($tipe, $filename) {
		//pengecekan apakah file ada di folder public, jika ada hapus file
		$exist = Storage::disk('public')->exists($filename);
		if ($exist) {
			Storage::disk('public')->delete($filename);
		}
		//melakukan export dari database
		if ($tipe == 'train') {
			Excel::store(new TrainingIPSExport, $filename, 'public');
		} elseif ($tipe =='test') {
			Excel::store(new TestingIPSExport, $filename, 'public');
		}
	}

	public function trainingToArff($buffer, $filename){
		$cmd = "java -cp C:\/xampp\htdocs\predictSNMPTN\public\storage\weka.jar weka.core.converters.CSVLoader C:\/xampp\htdocs\predictSNMPTN\public\storage\/".$filename.".csv > C:\/xampp\htdocs\predictSNMPTN\public\storage\IPS\/". $filename.".arff -B ".$buffer;
		exec($cmd, $output);	
	}

	public function testingToArff($buffer, $filename){
		$cmd = "java -cp C:\/xampp\htdocs\predictSNMPTN\public\storage\weka.jar weka.core.converters.CSVLoader C:\/xampp\htdocs\predictSNMPTN\public\storage\/".$filename.".csv > C:\/xampp\htdocs\predictSNMPTN\public\storage\IPS\/". $filename.".arff -B ".$buffer;
		exec($cmd, $output);
	}

	public function arffToModel($filename){
		$cmd = "java -cp C:\/xampp\htdocs\predictSNMPTN\public\storage\weka.jar weka.classifiers.trees.J48 -t C:\/xampp\htdocs\predictSNMPTN\public\storage\IPS\/".$filename.".arff -d C:\/xampp\htdocs\predictSNMPTN\public\storage\IPS\/".$filename.".model";
		exec($cmd, $output);
	}

	public function showBuatPrediksi(){
		$training = TrainingIPS::count();
		$testing = TestingIPS::count();
    	if ($training == 0 && $testing == 0) {
    		Session::flash('tidak ada');
    	}
    	$files = Storage::files('public');
		foreach (glob("C:\/xampp\htdocs\predictSNMPTN\public\storage\IPS\/*.model") as $file) {
		  $models[] = basename($file);
		}
		return view('IPS.buatPrediksiIPS')->with(compact('models'));
	}

	public function membuatPrediksi(Request $request){
		$testingIPS = new TestingIPS;
		$namaModel = $request->get('model');
		$expModel = explode(".", $namaModel);
		$namaModel = $expModel[0];
		$data = $request->all();
		foreach ($data as $key => $value) {
			if ($key != "_token" && $key != "model") {
				if ($value>= 90) {
					$testingIPS->$key  = "SANGAT_BAIK";
				} elseif ($value >= 80) {
					$testingIPS->$key  = "BAIK";
				} else {
					$testingIPS->$key  = "CUKUP";
				}
			}
		}
	    $testingIPS->save();
		$jumlahData = TestingIPS::count();
		//membuat file csv dari data training
		$tanggal = date("d-m-Y");
		$namaTesting = 'data'.'-'.$tanggal.'-'.'TestIPS';
		$this->createCSV('test',$namaTesting.'.csv');
		//membuat file arff dari file csv
		$this->testingToArff($jumlahData,$namaTesting);
		$cmd = "java -cp C:\/xampp\htdocs\predictSNMPTN\public\storage\weka.jar weka.classifiers.misc.InputMappedClassifier -I -trim -L C:\/xampp\htdocs\predictSNMPTN\public\storage\IPS\/".$namaModel.".model -t C:\/xampp\htdocs\predictSNMPTN\public\storage\IPS\/".$namaModel.".arff -T C:\/xampp\htdocs\predictSNMPTN\public\storage\IPS\/".$namaTesting.".arff -p 0";
		exec($cmd, $output);
		$explode = explode(":", $output[$jumlahData+40]);
		$explode2 = explode(" ", $explode[2]);
		$prediksi = $explode2[0];
		$ketepatan = $explode2[7];
		$testingBaru = TestingIPS::find($jumlahData);
		$testingBaru->status = $prediksi;
		$testingBaru->save();
		if ($prediksi == "LULUS") {
    		Session::flash('lulus');
    	} else {
    		Session::flash('tidak');
    	}
		return view('IPS.hasilPrediksiIPS',compact('prediksi','ketepatan','data'));
	}

	public function showCariPtn(){
		$hitung = SiswaIPS::count();
    	if ($hitung == 0) {
    		Session::flash('tidak ada');
    	}
		return view('IPS.daftarPTN_IPS');
	}

	public function cariPtnIPS(Request $request){
    	$mataPelajaran = $request->mataPelajaran;
    	switch ($mataPelajaran) {
    		case 'ind':
    			$namaMatpel = "Bahasa Indonesia";
    			break;
    		case 'ing':
    			$namaMatpel = "Bahasa Inggris";
    			break;
    		case 'mat':
    			$namaMatpel = "Matematika";
    			break;
    		case 'geo':
    			$namaMatpel = "Geografi";
    			break;
    		case 'eko':
    			$namaMatpel = "Ekonomi";
    			break;
    		case 'sos':
    			$namaMatpel = "Sosiologi";
    			break;
    		default:
    			# code...
    			break;
    	}
    	$semester = $request->semester;
    	$matPelSemester = $mataPelajaran.$semester;
    	$simbol = $request->simbol;
    	$nilai = $request->nilai;
    	$info = "menampilkan daftar ptn dan jurusan dengan kriteria nilai mata pelajaran ".$namaMatpel." di semester ".$semester. " " . $simbol . " " . $nilai;
    	$dataPTN = SiswaIPS::where($matPelSemester,$simbol,$nilai)->where('status', 'like' , 'LULUS')->paginate();
    	$dataPTN->appends($request->only('matPelSemester', 'nilai'));
    	Session::flash('lulus');
    	return view('IPS.daftarPTN_IPS',compact('dataPTN', 'info'));
    }

	public function showTree(){
		$hitung = SiswaIPS::count();
    	if ($hitung == 0) {
    		Session::flash('tidak ada');
    	}
    	$files = Storage::files('public');
		foreach (glob("C:\/xampp\htdocs\predictSNMPTN\public\storage\IPS\/*.model") as $file) {
		  $models[] = basename($file);
		}
		return view('IPS.lihatTreeIPS',compact('models'));
	}

	public function membuatTreeIPS(Request $request){
		$model = $request->get('model');
		$expModel = explode(".", $model);
		$model = $expModel[0];
		$cmd = "java -cp C:\/xampp\htdocs\predictSNMPTN\public\storage\weka.jar weka.classifiers.trees.J48 -t C:\/xampp\htdocs\predictSNMPTN\public\storage\IPS\/".$model.".arff -v -no-cv";
		exec($cmd, $output);
		$dataTree = $output;
		return view('IPS.hasilTreeIPS',compact('dataTree','model'));
	}

	public function showAkurasi(){
		$hitung = SiswaIPS::count();
    	if ($hitung == 0) {
    		Session::flash('tidak ada');
    	}
		$files = Storage::files('public');
		foreach (glob("C:\/xampp\htdocs\predictSNMPTN\public\storage\IPS\/*.model") as $file) {
		  $models[] = basename($file);
		}
		return view('IPS.lihatAkurasiIPS',compact('models'));
	}

	public function membuatAkurasiIPS(Request $request){
		$model = $request->get('model');
		$expModel = explode(".", $model);
		$model = $expModel[0];
		$cmd = "java -cp C:\/xampp\htdocs\predictSNMPTN\public\storage\weka.jar weka.classifiers.trees.J48 -t C:\/xampp\htdocs\predictSNMPTN\public\storage\IPS\/".$model.".arff -v -o";
		exec($cmd, $output);
		$dataAkurasi = $output;
		return view('IPS.hasilAkurasiIPS',compact('dataAkurasi', 'model'));
	}
}