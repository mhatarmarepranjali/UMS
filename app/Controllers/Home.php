<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Home\User; // Import the model
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Mpdf\Mpdf;
class Home extends BaseController
{
    public function index()
    {
       
        $userModel = new User();
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT * FROM users');
        $results = $query->getResult();
        foreach ($results as $row) {
        }
        $string = 'ok'; 
        $data['users'] = $userModel->findAll();
        return view('welcome_message', $data);

    }
    public function store()
    {
        $first_name = $this->request->getPost('first_name');
        $last_name = $this->request->getPost('last_name');
        $email = $this->request->getPost('email');
        $dob = $this->request->getPost('dob');
        $gender = $this->request->getPost('gender');
        $address = $this->request->getPost('address');

      

        $userModel = new User();
        // Handle file upload
        $profilePic = $this->request->getFile('profile_pic');
        $originalName = $profilePic->getName();
        $filePath = 'public/uploads/' . $originalName;
        $profilePic->move(ROOTPATH . 'public/uploads',$originalName);
        $data['profile_pic'] = $originalName;
        $allowedFields = ['id', 'f_name', 'l_name', 'address','dob','email','gender','profile_pic'];
        $data = [
           
            'f_name' => $first_name, 
            'l_name' => $last_name, 
            'email' => $email,
            'dob' => $dob,
            'gender' => $gender, 
            'address' => $address,
            'profile_pic'=>$filePath
        ];
        
        // Insert data and return inserted row's primary key
        try {
            $userModel->insert($data);
            return redirect()->to('http://localhost/codeigniter4/public');
        } catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    public function edituser($id){
        $userModel = new User();
        $data['record'] = $userModel->find($id);
       
        return view('edit_user', $data);
    }
    public function viewuser($id){
        $userModel = new User();
        $data['record'] = $userModel->find($id);
       // var_dump($data['record']);

        // if (!$data['record']) {
        //     return redirect()->to('/not_found'); // Redirect to a not found page or handle accordingly
        // }
        return view('view_user', $data);
    }
    public function update()
    {
        
        $userModel = new User();
        // Get the posted data from the form
        $id = $this->request->getPost('id');
        $profilePic = $this->request->getFile('profile_pic');
    //var_dump($profilePic);die;
        $originalName = $profilePic->getName();
        $filePath = 'public/uploads/' . $originalName;
        $profilePic->move(ROOTPATH . 'public/uploads',$originalName);
        $newData = [
            'f_name' => $this->request->getPost('first_name'),
            'l_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'dob' => $this->request->getPost('dob'),
            'gender' => $this->request->getPost('gender'),
            'address' => $this->request->getPost('address'),
            'profile_pic'=>$filePath
            
            // Add other fields as needed
        ];
        
        // Update the record
      
        $userModel->update($id, $newData);

        // Redirect to a success page or handle accordingly
        return redirect()->to('http://localhost/codeigniter4/public/');
        
    }

    public function delete($id)
    {
        $userModel = new User(); // Replace with your actual model
        
        // Check if the record exists before attempting to delete
        $existingUser = $userModel->find($id);

        if ($existingUser) {
            $userModel->delete($id);
            // Optionally, you may want to redirect back to a list page or display a success message.
            return redirect()->to('http://localhost/codeigniter4/public/')->with('success', 'Record deleted successfully.');
        } else {
            // Record not found, handle accordingly (e.g., redirect with error message)
            return redirect()->to('http://localhost/codeigniter4/public/')->with('error', 'Record not found.');
        }
    }
    public function do_upload()
    {
        $file = $this->request->getFile('userfile');
       
        if ($file->isValid() && !$file->hasMoved())
        {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);

            echo 'File uploaded successfully.';
        }
        else
        {
            echo 'Error uploading the file.';
        }
    
    } 
    
    public function exportToExcel()
    {
    
        $userModel = new User();
        // Fetch data from the database
        $data['users'] = $userModel->findAll();
        
        // Create a new Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Get the active sheet
        $sheet = $spreadsheet->getActiveSheet();
        $staticHeader = ['ID', 'First Name', 'Last Name','Address','DOB','Email Id','Gender','Profile Pic']; // Add your static headers
        $sheet->fromArray([$staticHeader], null, 'A1');

        // Add data rows
        $rowData = array_map(function ($user) {
            if (isset($user['gender'])) {
                $user['gender'] = ($user['gender'] == 1) ? 'Male' : 'Female';
            }
            return array_values($user);
        }, $data['users']);
        //var_dump($rowData);die;
        $sheet->fromArray($rowData, null, 'A2');
        // Create a Writer to output the Spreadsheet to Xlsx
        $writer = new Xlsx($spreadsheet);

        // Set the file name and header type
        $filename = 'user_data.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        // Output the Spreadsheet to the browser
        $writer->save('php://output');
        ///return redirect()->to('http://localhost/codeigniter4/public/');
    }

    public function exportToPDF()
    {
       
        $userModel = new User();
        $data['users'] = $userModel->findAll();
        // Load the mPDF library
        $mpdf = new Mpdf();

        // Load the HTML content (your table)
        $html = view('export_pdf', $data);
        $fontAwesomeCssPath = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css';
        // Write the HTML content to the PDF
        $mpdf->WriteHTML($html);
        $mpdf->WriteHTML('<link rel="stylesheet" href="' . $fontAwesomeCssPath . '">');

        // Output the PDF
        $mpdf->Output('exported_data.pdf', 'D'); // 'D' means download, adjust as needed
        //return redirect()->to('http://localhost/codeigniter4/public/');
    }

    
}
