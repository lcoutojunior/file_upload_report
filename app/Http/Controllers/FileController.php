<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class FileController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(){
		$reports = Report::all();
		
		return view('reports')->with('reports', $reports);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(){
		return response()->json("report created");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request){
		if($request->hasFile('file_report')){

			$fileContent = file_get_contents($request->file('file_report'));
			
			$arrFileContent = explode("\n", $fileContent);
					
			for($i=1; $i<sizeof($arrFileContent)-1; $i++){
				$report = explode("\t", $arrFileContent[$i]);
				$r = new Report();
				$r->buyer = $report[0];
				$r->description = $report[1];
				$r->unit_price = $report[2];
				$r->qty = $report[3];
				$r->address = $report[4];
				$r->supplier = $report[5];
				$r->revenue = $report[2] * $report [3];
				$r->save();
			}
		
			$status = true;
			return view('uploaded')->with('status', $status);
		}else{
			return redirect('/');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param \App\Models\File $file
	 * @return \Illuminate\Http\Response
	 */
	public function show($reportId){
		return response()->json("report: " . $reportId);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\File $file
	 * @return \Illuminate\Http\Response
	 */
	public function edit(File $file){
		return response()->json("report edited");
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\File $file
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, File $file){
		return response()->json("report updated");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\File $file
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(File $file){
		return response()->json("report destroyed");
	}
	
}
