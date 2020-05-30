<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SiswaIPA;
use App\TrainingIPA;
use App\TestingIPA;

use Session;
use DB;

use App\Imports\SiswaIPAImport;
use App\Exports\SiswaIPAExport;
use App\Exports\TrainingIPAExport;
use App\Exports\TestingIPAExport;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class SiswaIPAController extends Controller{

	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function index(){
    	$siswaIPA = SiswaIPA::paginate(10);
    	$hitung = SiswaIPA::count();
    	if ($hitung > 0) {
    		Session::flash('ada');
    	}
    	return view('IPA.indexIPA',compact('siswaIPA'));
    }

    public function cari(Request $request){
    	$field = $request->field;
    	$dataCari = $request->cari;
    	$hitung = SiswaIPA::count();
    	if ($hitung > 0) {
    		Session::flash('ada');
    	}
    	$siswaIPA = SiswaIPA::where($field,'like',"%".$dataCari."%")->paginate();
    	$siswaIPA->appends($request->only('field','cari'));

    	return view('IPA.indexIPA',compact('siswaIPA'));
    }

    public function formatFile(){
    	return Storage::disk('public')->download('dataIPA.xlsx');
    }

	public function import(){	
		try{
			$siswaArray = Excel::toArray(New SiswaIPAImport, request()->file('file'));
			foreach ($siswaArray[0] as $key => $value) {
				if ($value['status'] == "LULUS") {
					$siswa = SiswaIPA::firstOrNew(array('nisn' => $value['nisn'],'nama' => $value['nama'],'angkatan' => $value['angkatan'],'ind1' => $value['ind1'],'ind2' => $value['ind2'],'ind3' => $value['ind3'],'ind4' => $value['ind4'], 'ind5' => $value['ind5'], 'ing1' => $value['ing1'], 'ing2' => $value['ing2'], 'ing3' => $value['ing3'], 'ing4' => $value['ing4'], 'ing5' => $value['ing5'],'mat1' => $value['mat1'], 'mat2' => $value['mat2'], 'mat3' => $value['mat3'], 'mat4' => $value['mat4'], 'mat5' => $value['mat5'], 'fis1' => $value['fis1'], 'fis2' => $value['fis2'], 'fis3' => $value['fis3'], 'fis4' => $value['fis4'],'fis5' => $value['fis5'], 'kim1' => $value['kim1'], 'kim2' => $value['kim2'], 'kim3' => $value['kim3'], 'kim4' => $value['kim4'],'kim5' => $value['kim5'], 'bio1' => $value['bio1'], 'bio2' => $value['bio2'], 'bio3' => $value['bio3'], 'bio4' => $value['bio4'],'bio5' => $value['bio5'], 'ptn' => $value['ptn'],'jurusan' => $value['jurusan'],'status' => $value['status']));
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
		return redirect()->route('indexIPA');
	}

	public function delete_all(){
		SiswaIPA::truncate();
		TrainingIPA::truncate();
		TestingIPA::truncate();
		return redirect()->route('indexIPA');
	}

	public function memasukanData($siswaArray){
		$pelajaran = array('ind', 'ing', 'mat', 'fis', 'kim', 'bio');
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
				$dataTesting[] = array('ind1' => $value['ind1'],'ind2' => $value['ind2'],'ind3' => $value['ind3'],'ind4' => $value['ind4'], 'ind5' => $value['ind5'], 'ing1' => $value['ing1'], 'ing2' => $value['ing2'], 'ing3' => $value['ing3'], 'ing4' => $value['ing4'], 'ing5' => $value['ing5'],'mat1' => $value['mat1'], 'mat2' => $value['mat2'], 'mat3' => $value['mat3'], 'mat4' => $value['mat4'], 'mat5' => $value['mat5'], 'fis1' => $value['fis1'], 'fis2' => $value['fis2'], 'fis3' => $value['fis3'], 'fis4' => $value['fis4'],'fis5' => $value['fis5'], 'kim1' => $value['kim1'], 'kim2' => $value['kim2'], 'kim3' => $value['kim3'], 'kim4' => $value['kim4'],'kim5' => $value['kim5'], 'bio1' => $value['bio1'], 'bio2' => $value['bio2'], 'bio3' => $value['bio3'], 'bio4' => $value['bio4'],'bio5' => $value['bio5'], 'status' => $value['status']
				);
			} else {
				$dataTraining[] = array('ind1' => $value['ind1'],'ind2' => $value['ind2'],'ind3' => $value['ind3'],'ind4' => $value['ind4'], 'ind5' => $value['ind5'], 'ing1' => $value['ing1'], 'ing2' => $value['ing2'], 'ing3' => $value['ing3'], 'ing4' => $value['ing4'], 'ing5' => $value['ing5'],'mat1' => $value['mat1'], 'mat2' => $value['mat2'], 'mat3' => $value['mat3'], 'mat4' => $value['mat4'], 'mat5' => $value['mat5'], 'fis1' => $value['fis1'], 'fis2' => $value['fis2'], 'fis3' => $value['fis3'], 'fis4' => $value['fis4'],'fis5' => $value['fis5'], 'kim1' => $value['kim1'], 'kim2' => $value['kim2'], 'kim3' => $value['kim3'], 'kim4' => $value['kim4'],'kim5' => $value['kim5'], 'bio1' => $value['bio1'], 'bio2' => $value['bio2'], 'bio3' => $value['bio3'], 'bio4' => $value['bio4'],'bio5' => $value['bio5'], 'status' => $value['status']
				);
			}
		}
		//mengecek table apakah kosong atau tidak, jika kosong hapus
		$checkRowTrain = TrainingIPA::count();
		$checkRowTesting = TestingIPA::count();
		if ($checkRowTrain > 0) {
			TrainingIPA::truncate();
		} 
		if ($checkRowTesting > 0) {
			TestingIPA::truncate();
		}
		//memasukan data array dataTraining ke table training ipa
		TrainingIPA::insert($dataTraining);
		//membuat file csv dari data training
		$this->createCSV('train','data'.'-'.$tanggal.'-'.'TrainIPA'.'.csv');
		//membuat file arff dari file csv
		$this->trainingToArff(sizeof($dataTraining),'data'.'-'.$tanggal.'-'.'TrainIPA');
		//memasukan data array dataTesting ke table testing ipa
		TestingIPA::insert($dataTesting);
		//membuat file csv dari data training
		$this->createCSV('test','data'.'-'.$tanggal.'-'.'TestIPA'.'.csv');
		//membuat file arff dari file csv
		$this->testingToArff(sizeof($dataTesting),'data'.'-'.$tanggal.'-'.'TestIPA');
		//membuat model dari file arff
		$this->arffToModel('data'.'-'.$tanggal.'-'.'TrainIPA');
	}

	public function createCSV($tipe, $filename) {
		//pengecekan apakah file ada di folder public, jika ada hapus file
		$exist = Storage::disk('public')->exists($filename);
		if ($exist) {
			Storage::disk('public')->delete($filename);
		}
		//melakukan export dari database
		if ($tipe == 'train') {
			Excel::store(new TrainingIPAExport, $filename, 'public');
		} elseif ($tipe =='test') {
			Excel::store(new TestingIPAExport, $filename, 'public');
		}
	}

	public function trainingToArff($buffer, $filename){
		$cmd = "java -cp C:\/xampp\htdocs\predictSNMPTN\public\storage\weka.jar weka.core.converters.CSVLoader C:\/xampp\htdocs\predictSNMPTN\public\storage\/".$filename.".csv > C:\/xampp\htdocs\predictSNMPTN\public\storage\IPA\/". $filename.".arff -B ".$buffer;
		exec($cmd, $output);	
	}

	public function testingToArff($buffer, $filename){
		$cmd = "java -cp C:\/xampp\htdocs\predictSNMPTN\public\storage\weka.jar weka.core.converters.CSVLoader C:\/xampp\htdocs\predictSNMPTN\public\storage\/".$filename.".csv > C:\/xampp\htdocs\predictSNMPTN\public\storage\IPA\/". $filename.".arff -B ".$buffer;
		exec($cmd, $output);
	}

	public function arffToModel($filename){
		$cmd = "java -cp C:\/xampp\htdocs\predictSNMPTN\public\storage\weka.jar weka.classifiers.trees.J48 -t C:\/xampp\htdocs\predictSNMPTN\public\storage\IPA\/".$filename.".arff -d C:\/xampp\htdocs\predictSNMPTN\public\storage\IPA\/".$filename.".model";
		exec($cmd, $output);
	}

	public function showBuatPrediksi(){
		$training = TrainingIPA::count();
		$testing = TestingIPA::count();
    	if ($training == 0 && $testing == 0) {
    		Session::flash('tidak ada');
    	}
    	$files = Storage::files('public');
		foreach (glob("C:\/xampp\htdocs\predictSNMPTN\public\storage\IPA\/*.model") as $file) {
		  $models[] = basename($file);
		}
		return view('IPA.buatPrediksiIPA')->with(compact('models'));
	}

	public function membuatPrediksi(Request $request){
		$testingIPA = new TestingIPA;
		$namaModel = $request->get('model');
		$expModel = explode(".", $namaModel);
		$namaModel = $expModel[0];
		$data = $request->all();
		foreach ($data as $key => $value) {
			if ($key != "_token" && $key != "model") {
				if ($value>= 90) {
					$testingIPA->$key  = "SANGAT_BAIK";
				} elseif ($value >= 80) {
					$testingIPA->$key  = "BAIK";
				} else {
					$testingIPA->$key  = "CUKUP";
				}
			}
		}
	    $testingIPA->save();
		$jumlahData = TestingIPA::count();
		//membuat file csv dari data training
		$tanggal = date("d-m-Y");
		$namaTesting = 'data'.'-'.$tanggal.'-'.'TestIPA';
		$this->createCSV('test',$namaTesting.'.csv');
		//membuat file arff dari file csv
		$this->testingToArff($jumlahData,$namaTesting);
		$cmd = "java -cp C:\/xampp\htdocs\predictSNMPTN\public\storage\weka.jar weka.classifiers.misc.InputMappedClassifier -I -trim -L C:\/xampp\htdocs\predictSNMPTN\public\storage\IPA\/".$namaModel.".model -t C:\/xampp\htdocs\predictSNMPTN\public\storage\IPA\/".$namaModel.".arff -T C:\/xampp\htdocs\predictSNMPTN\public\storage\IPA\/".$namaTesting.".arff -p 0";
		exec($cmd, $output);
		$explode = explode(":", $output[$jumlahData+40]);
		$explode2 = explode(" ", $explode[2]);
		$prediksi = $explode2[0];
		$ketepatan = $explode2[7];
		$testingBaru = TestingIPA::find($jumlahData);
		$testingBaru->status = $prediksi;
		$testingBaru->save();
		if ($prediksi == "LULUS") {
    		Session::flash('lulus');
    	} else {
    		Session::flash('tidak');
    	}
		return view('IPA.hasilPrediksiIPA',compact('prediksi','ketepatan','data'));
	}

	public function showCariPtn(){
		$hitung = SiswaIPA::count();
    	if ($hitung == 0) {
    		Session::flash('tidak ada');
    	}
		return view('IPA.daftarPTN_IPA');
	}

	public function cariPtnIPA(Request $request){
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
    		case 'fis':
    			$namaMatpel = "Fisika";
    			break;
    		case 'kim':
    			$namaMatpel = "Kimia";
    			break;
    		case 'bio':
    			$namaMatpel = "Biologi";
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
    	$dataPTN = SiswaIPA::where($matPelSemester,$simbol,$nilai)->where('status', 'like' , 'LULUS')->paginate();
    	$dataPTN->appends($request->only('matPelSemester', 'nilai'));
    	Session::flash('lulus');
    	return view('IPA.daftarPTN_IPA',compact('dataPTN', 'info'));
    }

	public function showTree(){
		$hitung = SiswaIPA::count();
    	if ($hitung == 0) {
    		Session::flash('tidak ada');
    	}
    	$files = Storage::files('public');
		foreach (glob("C:\/xampp\htdocs\predictSNMPTN\public\storage\IPA\/*.model") as $file) {
		  $models[] = basename($file);
		}
		return view('IPA.lihatTreeIPA',compact('models'));
	}

	public function membuatTreeIPA(Request $request){
		$model = $request->get('model');
		$expModel = explode(".", $model);
		$model = $expModel[0];
		$cmd = "java -cp C:\/xampp\htdocs\predictSNMPTN\public\storage\weka.jar weka.classifiers.trees.J48 -t C:\/xampp\htdocs\predictSNMPTN\public\storage\IPA\/".$model.".arff -v -no-cv";
		exec($cmd, $output);
		$dataTree = $output;
		return view('IPA.hasilTreeIPA',compact('dataTree','model'));
	}

	public function showAkurasi(){
		$hitung = SiswaIPA::count();
    	if ($hitung == 0) {
    		Session::flash('tidak ada');
    	}
		$files = Storage::files('public');
		foreach (glob("C:\/xampp\htdocs\predictSNMPTN\public\storage\IPA\/*.model") as $file) {
		  $models[] = basename($file);
		}
		return view('IPA.lihatAkurasiIPA',compact('models'));
	}

	public function membuatAkurasiIPA(Request $request){
		$model = $request->get('model');
		$expModel = explode(".", $model);
		$model = $expModel[0];
		$cmd = "java -cp C:\/xampp\htdocs\predictSNMPTN\public\storage\weka.jar weka.classifiers.trees.J48 -t C:\/xampp\htdocs\predictSNMPTN\public\storage\IPA\/".$model.".arff -v -o";
		exec($cmd, $output);
		$dataAkurasi = $output;
		return view('IPA.hasilAkurasiIPA',compact('dataAkurasi', 'model'));
	}
}