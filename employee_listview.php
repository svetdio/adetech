<?php
session_start();
if (isset($_SESSION['login_details'])) {
    $isBranchHead = $_SESSION['login_details']['isBranchHead'];
    if ($isBranchHead == 0) {
        echo "<script type='text/javascript'>
            alert('You are not supposed to be here. Redirecting..')
            window.location = 'bundle1.php';
        </script>";
    }
} else {
    echo "<script type='text/javascript'> 
  localStorage.removeItem('adetech_user');
  window.location = 'login.php'
</script>";
}
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List | AllShirt Commercial Outlet</title>
    <link href="css/fontawesome.min.css" rel="stylesheet">
    <link href="css/bulma.css" rel="stylesheet">
    <link href="css/tailwind.min.css" rel="stylesheet">
    <link href="css/datatables.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src='js/jquery.min.js'> </script>
    <script src='js/datatables.js'> </script>
    <script src="js/alpine.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/emp_list.js"></script>
    <script defer src='js/modal.js'> </script>
</head>

<body class="bg-blue-gray-50" x-data="initApp()">
    <!-- noprint-area -->
    <div class="hide-print flex flex-row h-screen antialiased text-blue-gray-800">
        <!-- left sidebar -->
        <div class="flex flex-row w-auto flex-shrink-0 pl-4 pr-2 py-4">
            <div class="flex flex-col items-center py-4 flex-shrink-0 w-20 bg-cyan-500 rounded-3xl">
                <a href="home.php" class="flex items-center justify-center h-12 w-12 bg-cyan-50 text-cyan-700 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="123.3" height="123.233" viewBox="0 0 32.623 32.605">
                        <path d="M15.612 0c-.36.003-.705.01-1.03.021C8.657.223 5.742 1.123 3.4 3.472.714 6.166-.145 9.758.019 17.607c.137 6.52.965 9.271 3.542 11.768 1.31 1.269 2.658 2 4.73 2.57.846.232 2.73.547 3.56.596.36.021 2.336.048 4.392.06 3.162.018 4.031-.016 5.63-.221 3.915-.504 6.43-1.778 8.234-4.173 1.806-2.396 2.514-5.731 2.516-11.846.001-4.407-.42-7.59-1.278-9.643-1.463-3.501-4.183-5.53-8.394-6.258-1.634-.283-4.823-.475-7.339-.46z" fill="#fff" />
                        <path d="M16.202 13.758c-.056 0-.11 0-.16.003-.926.031-1.38.172-1.747.538-.42.421-.553.982-.528 2.208.022 1.018.151 1.447.553 1.837.205.198.415.313.739.402.132.036.426.085.556.093.056.003.365.007.686.009.494.003.63-.002.879-.035.611-.078 1.004-.277 1.286-.651.282-.374.392-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.147-.072zM16.22 19.926c-.056 0-.11 0-.16.003-.925.031-1.38.172-1.746.539-.42.42-.554.981-.528 2.207.02 1.018.15 1.448.553 1.838.204.198.415.312.738.4.132.037.426.086.556.094.056.003.365.007.686.009.494.003.63-.002.88-.034.61-.08 1.003-.278 1.285-.652.282-.374.393-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.863-1.31-.977a7.91 7.91 0 00-1.146-.072zM22.468 13.736c-.056 0-.11.001-.161.003-.925.032-1.38.172-1.746.54-.42.42-.554.98-.528 2.207.021 1.018.15 1.447.553 1.837.205.198.415.313.739.401.132.037.426.086.556.094.056.003.364.007.685.009.494.003.63-.002.88-.035.611-.078 1.004-.277 1.285-.651.282-.375.393-.895.393-1.85 0-.688-.065-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.146-.072z" fill="#00dace" />
                        <path d="M9.937 13.736c-.056 0-.11.001-.161.003-.925.032-1.38.172-1.746.54-.42.42-.554.98-.528 2.207.021 1.018.15 1.447.553 1.837.204.198.415.313.738.401.133.037.427.086.556.094.056.003.365.007.686.009.494.003.63-.002.88-.035.61-.078 1.003-.277 1.285-.651.282-.375.393-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.146-.072zM16.202 7.59c-.056 0-.11 0-.16.002-.926.032-1.38.172-1.747.54-.42.42-.553.98-.528 2.206.022 1.019.151 1.448.553 1.838.205.198.415.312.739.401.132.037.426.086.556.093.056.003.365.007.686.01.494.002.63-.003.879-.035.611-.079 1.004-.278 1.286-.652.282-.374.392-.895.393-1.85 0-.688-.066-1.185-.2-1.505-.228-.547-.653-.864-1.31-.978a7.91 7.91 0 00-1.147-.071z" fill="#00bcd4" />
                        <g>
                            <path d="M15.612 0c-.36.003-.705.01-1.03.021C8.657.223 5.742 1.123 3.4 3.472.714 6.166-.145 9.758.019 17.607c.137 6.52.965 9.271 3.542 11.768 1.31 1.269 2.658 2 4.73 2.57.846.232 2.73.547 3.56.596.36.021 2.336.048 4.392.06 3.162.018 4.031-.016 5.63-.221 3.915-.504 6.43-1.778 8.234-4.173 1.806-2.396 2.514-5.731 2.516-11.846.001-4.407-.42-7.59-1.278-9.643-1.463-3.501-4.183-5.53-8.394-6.258-1.634-.283-4.823-.475-7.339-.46z" fill="#fff" />
                            <path d="M16.202 13.758c-.056 0-.11 0-.16.003-.926.031-1.38.172-1.747.538-.42.421-.553.982-.528 2.208.022 1.018.151 1.447.553 1.837.205.198.415.313.739.402.132.036.426.085.556.093.056.003.365.007.686.009.494.003.63-.002.879-.035.611-.078 1.004-.277 1.286-.651.282-.374.392-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.147-.072zM16.22 19.926c-.056 0-.11 0-.16.003-.925.031-1.38.172-1.746.539-.42.42-.554.981-.528 2.207.02 1.018.15 1.448.553 1.838.204.198.415.312.738.4.132.037.426.086.556.094.056.003.365.007.686.009.494.003.63-.002.88-.034.61-.08 1.003-.278 1.285-.652.282-.374.393-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.863-1.31-.977a7.91 7.91 0 00-1.146-.072zM22.468 13.736c-.056 0-.11.001-.161.003-.925.032-1.38.172-1.746.54-.42.42-.554.98-.528 2.207.021 1.018.15 1.447.553 1.837.205.198.415.313.739.401.132.037.426.086.556.094.056.003.364.007.685.009.494.003.63-.002.88-.035.611-.078 1.004-.277 1.285-.651.282-.375.393-.895.393-1.85 0-.688-.065-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.146-.072z" fill="#00dace" />
                            <path d="M9.937 13.736c-.056 0-.11.001-.161.003-.925.032-1.38.172-1.746.54-.42.42-.554.98-.528 2.207.021 1.018.15 1.447.553 1.837.204.198.415.313.738.401.133.037.427.086.556.094.056.003.365.007.686.009.494.003.63-.002.88-.035.61-.078 1.003-.277 1.285-.651.282-.375.393-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.146-.072zM16.202 7.59c-.056 0-.11 0-.16.002-.926.032-1.38.172-1.747.54-.42.42-.553.98-.528 2.206.022 1.019.151 1.448.553 1.838.205.198.415.312.739.401.132.037.426.086.556.093.056.003.365.007.686.01.494.002.63-.003.879-.035.611-.079 1.004-.278 1.286-.652.282-.374.392-.895.393-1.85 0-.688-.066-1.185-.2-1.505-.228-.547-.653-.864-1.31-.978a7.91 7.91 0 00-1.147-.071z" fill="#00bcd4" />
                        </g>
                    </svg>
                </a>
                <ul class="flex flex-col py-4 space-y-2 mt-12">
                    <!--webpage 1-->
                    <li>
                        <a href="bundle1.php" class="flex items-center">
                            <span class="flex items-center justify-center text-cyan-100 hover:bg-cyan-400 h-12 w-12 rounded-2xl">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-6 w-6" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    <!--webpage 3-->
                    <li>
                        <a href="webpage3.php" class="flex items-center">
                            <span class="flex items-center justify-center text-cyan-100 hover:bg-cyan-400 h-12 w-12 rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    <!--webpage 2-->
                    <li>
                        <a href="webpage2_new.php" class="flex items-center">
                            <span class="flex items-center justify-center text-cyan-100 hover:bg-cyan-400 h-12 w-12 rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="h-6 w-6" viewBox="0 0 16 16">
                                    <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z" />
                                    <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    <!-- employee list -->
                    <li>
                        <a href="employee_listview.php" class="flex items-center">
                            <span class="flex items-center justify-center h-12 w-12 rounded-2xl" x-bind:class="{
                  'hover:bg-cyan-400 text-cyan-100': activeMenu !== 'pos',
                  'bg-cyan-300 shadow-lg text-white': activeMenu === 'pos',
                }">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-6 w-6 bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    <!-- sales report -->
                    <li>
                        <a href="sales_report.php" class="flex items-center">
                            <span class="flex items-center justify-center text-cyan-100 hover:bg-cyan-400 h-12 w-12 rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-6 w-6 bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    <!-- products -->
                    <li>
                        <a href="products.php" class="flex items-center">
                            <span class="flex items-center justify-center text-cyan-100 hover:bg-cyan-400 h-12 w-12 rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-6 w-6 bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    <!--log out-->
                    <li>
                        <a href="#" id="logout" class="flex items-center bottom-0  " x-on:click="logout()">
                            <span class="flex items-center justify-center text-cyan-100 hover:bg-cyan-400 h-12 w-12 rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="black" class="h-6 w-6" viewBox="0 0 16 16">
                                    <path d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                    <path d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg>
                                </svg>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- page content -->
        <div class="flex-col flex h-full w-full">
            <!-- store menu -->
            <div class="w-full mt-4">
                <div class="flex pb-4 px-4 text-xl font-extrabold">
                    <h1>EMPLOYEE LIST</h1>
                </div>
                <div class="flex flex-row-reverse pb-4 px-4 text-xl font-extrabold float-none">
                    <button class="text-white rounded-2xl text-lg w-60 py-3 inset-y-0 right-0 focus:outline-none bg-cyan-500 hover:bg-cyan-600 js-modal-trigger" data-target="add_emp_form">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        New Employee
                    </button>
                </div>
                <div class="h-full overflow-y-auto px-2">
                    <table class="display" id="employee_table">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Nationality</th>
                                <th>Civil Status</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Employee Status</th>
                                <th>Qualified Dependent Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = file_get_contents($host_url . '/api/get_emp.php');
                            $data = json_decode($data, true);
                            foreach ($data as $k => $v) {
                            ?>
                                <tr>
                                    <td>
                                        <div class="field has-addons">
                                            <p class="control">
                                                <button class="button is-small btn-edit-item js-modal-trigger" data-target="upd_emp_form" data-emp_id="<?php echo $v['id'] ?>" title="Edit Information">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                            </p>
                                            <p class="control">
                                                <a href="webpage2_new.php?emp_id=<?php echo $v['id'] ?>" class="button is-small btn-open-payroll" data-emp_id="<?php echo $v['id'] ?>" title="Open Payroll">
                                                    <span> <i class="fa fa-credit-card" aria-hidden="true"></i> </span>
                                                </a>
                                            </p>
                                            <p class="control">
                                                <button class="button is-small btn-delete-item" data-emp_id="<?php echo $v['id'] ?>" title="Delete Employee">
                                                    <span> <i class="fa fa-trash" aria-hidden="true" style="color: red"></i> </span>
                                                </button>
                                            </p>
                                        </div>
                                    </td>
                                    <td><?php echo $v['id'] ?></td>
                                    <td><?php echo $v['emp_name'] ?></td>
                                    <td><?php echo ucwords($v['gender']) ?></td>
                                    <td><?php echo $v['bday'] ?></td>
                                    <td><?php echo ucwords($v['natl']); ?></td>
                                    <td><?php echo ucwords($v['c_status']); ?></td>
                                    <td><?php echo ucwords($v['dept']); ?></td>
                                    <td><?php echo ucwords($v['desg']); ?></td>
                                    <td><?php echo ucwords($v['emp_status']); ?></td>
                                    <td><?php echo ucwords($v['tax_status']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <!-- Main modal -->
        <div id='add_emp_form' class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">New Employee</p>
                    <button class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label for="emp_name" class="label">Employee Name</label>
                        <span id="emp_name" class="has-text-danger errormsg"></span>
                        <input type="text" class="input" id="emp_name" placeholder="Employee Name">
                    </div>
                    <div class="field">
                        <label for="gender" class="label">Gender</label>
                        <div id="gender" class="has-text-danger errormsg"></div>
                        <div class="select">
                            <select id="gender">
                                <option value="0">--- Please select a gender ---</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label for="bday" class="label">Date of Birth</label>
                        <span id="bday" class="has-text-danger errormsg"></span>
                        <input class="input" type="date" placeholder="Date of Birth" id="bday">
                    </div>
                    <div class="field">
                        <label for="natl" class="label">Nationality</label>
                        <div id="natl" class="has-text-danger errormsg"></div>
                        <div class="select">
                            <select id="natl">
                                <option value="0">--- Please select a nationality ---</option>
                                <?php
                                $countries = file_get_contents($host_url . '/api/countries.json');
                                $countries = json_decode($countries, true);
                                foreach ($countries as $country) {
                                ?>
                                    <option value="<?php echo $country['nationality']; ?>"><?php echo $country['nationality']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label for="c_status" class="label">Civil Status</label>
                        <div id="c_status" class="has-text-danger errormsg"></div>
                        <div class="select">
                            <select id="c_status">
                                <option value="0">--- Please select civil status ---</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Department</label>
                        <span id="dept" class="has-text-danger errormsg"></span>
                        <input type="text" class="input" id="dept" placeholder="Department">
                    </div>
                    <div class="field">
                        <label for="" class="label">Designation</label>
                        <span id="desg" class="has-text-danger errormsg"></span>
                        <input type="text" class="input" id="desg" placeholder="Designation">
                    </div>
                    <div class="field">
                        <label for="" class="label">Employee Status</label>
                        <span id="emp_status" class="has-text-danger errormsg"></span>
                        <input type="text" class="input" id="emp_status" placeholder="Employee Status">
                    </div>
                    <div class="field">
                        <label for="" class="label">Qualified Dependent Status</label>
                        <span id="tax_status" class="has-text-danger errormsg"></span>
                        <div class="select">
                            <select id="tax_status">
                                <option value="0">--- Please select tax status ---</option>
                                <option value="Z">No Exemption</option>
                                <optgroup label="For Single">
                                    <option value="S1">Single - 1 Dependent</option>
                                    <option value="S2">Single - 2 Dependents</option>
                                    <option value="S3">Single - 3 Dependents</option>
                                    <option value="S4">Single - 4 Dependents</option>
                                </optgroup>
                                <optgroup label="For Married">
                                    <option value="M1">Married - 1 Dependent</option>
                                    <option value="M2">Married - 2 Dependents</option>
                                    <option value="M3">Married - 3 Dependents</option>
                                    <option value="M4">Married - 4 Dependents</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Employee Image</label>
                        <span id="emp_image" class="has-text-danger errormsg"></span>
                        <div id="file-js-example" class="file has-name is-primary">
                            <label class="file-label">
                                <input class="file-input" type="file" name="emp_image" id="emp_image" accept="image/*">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fa fa-upload"></i>
                                    </span>
                                    <span class="file-label">
                                        Choose a file…
                                    </span>
                                </span>
                                <span class="file-name">
                                    No file uploaded
                                </span>
                            </label>

                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Image Preview</label>
                        <figure class="image is-128x128">
                            <img id="add-img-viewer" src="img/default-img.png" alt="Product Image" />
                        </figure>
                    </div>

                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success" id='add_emp'>Save</button>
                    <button class="button cancel">Cancel</button>
                </footer>
            </div>
        </div>

        <div id='upd_emp_form' class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Update Employee Details</p>
                    <button class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label for="emp_name" class="label">Employee Name</label>
                        <span id="emp_name" class="has-text-danger errormsg"></span>
                        <input type="text" class="input" id="emp_name" placeholder="Employee Name">
                    </div>
                    <div class="field">
                        <label for="gender" class="label">Gender</label>
                        <div id="gender" class="has-text-danger errormsg"></div>
                        <div class="select">
                            <select id="gender">
                                <option value="0">--- Please select a gender ---</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label for="bday" class="label">Date of Birth</label>
                        <span id="bday" class="has-text-danger errormsg"></span>
                        <input class="input" type="date" placeholder="Date of Birth" id="bday">
                    </div>
                    <div class="field">
                        <label for="natl" class="label">Nationality</label>
                        <div id="natl" class="has-text-danger errormsg"></div>
                        <div class="select">
                            <select id="natl">
                                <option value="0">--- Please select a nationality ---</option>
                                <?php
                                $countries = file_get_contents($host_url . '/api/countries.json');
                                $countries = json_decode($countries, true);
                                foreach ($countries as $country) {
                                ?>
                                    <option value="<?php echo $country['nationality']; ?>"><?php echo $country['nationality']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label for="c_status" class="label">Civil Status</label>
                        <div id="c_status" class="has-text-danger errormsg"></div>
                        <div class="select">
                            <select id="c_status">
                                <option value="0">--- Please select civil status ---</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Department</label>
                        <span id="dept" class="has-text-danger errormsg"></span>
                        <input type="text" class="input" id="dept" placeholder="Department">
                    </div>
                    <div class="field">
                        <label for="" class="label">Designation</label>
                        <span id="desg" class="has-text-danger errormsg"></span>
                        <input type="text" class="input" id="desg" placeholder="Designation">
                    </div>
                    <div class="field">
                        <label for="" class="label">Employee Status</label>
                        <span id="emp_status" class="has-text-danger errormsg"></span>
                        <input type="text" class="input" id="emp_status" placeholder="Employee Status">
                    </div>
                    <div class="field">
                        <label for="" class="label">Qualified Dependent Status</label>
                        <span id="tax_status" class="has-text-danger errormsg"></span>
                        <div class="select">
                            <select id="tax_status">
                                <option value="0">--- Please select tax status ---</option>
                                <option value="Z">No Exemption</option>
                                <optgroup label="For Single">
                                    <option value="S1">Single - 1 Dependent</option>
                                    <option value="S2">Single - 2 Dependents</option>
                                    <option value="S3">Single - 3 Dependents</option>
                                    <option value="S4">Single - 4 Dependents</option>
                                </optgroup>
                                <optgroup label="For Married">
                                    <option value="M1">Married - 1 Dependent</option>
                                    <option value="M2">Married - 2 Dependents</option>
                                    <option value="M3">Married - 3 Dependents</option>
                                    <option value="M4">Married - 4 Dependents</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Employee Image</label>
                        <span id="emp_image" class="has-text-danger errormsg"></span>
                        <div id="file-js-example" class="file has-name is-primary">
                            <label class="file-label">
                                <input class="file-input" type="file" name="emp_image" id="emp_image" accept="image/*">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fa fa-upload"></i>
                                    </span>
                                    <span class="file-label">
                                        Choose a file…
                                    </span>
                                </span>
                                <span class="file-name" id="">
                                    No file uploaded
                                </span>
                            </label>

                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Image Preview</label>
                        <figure class="image is-128x128">
                            <img id="upd-img-viewer" src="img/default-img.png" alt="Product Image" />
                        </figure>
                    </div>

                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success" id='upd_emp'>Save</button>
                    <button class="button cancel">Cancel</button>
                </footer>
            </div>
        </div>
        <!-- end of store menu -->

        <!-- right sidebar -->

        <!-- cart items -->

        <!-- end of cart items -->

        <!-- payment info -->


        <!-- modal receipt -->
    </div>
    <!-- end of noprint-area -->

    <div id="print-area" class="print-area"></div>
</body>

</html>