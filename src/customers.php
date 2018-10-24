<?php 

class Customers {

	private $connect;

    public function __construct(){
    	date_default_timezone_set('America/Sao_Paulo');
       $this->connect = new mysqli('p:localhost','root','','crud_bd'); //Set access BD
    }

    public function register_customer($form) {
    	session_start();
    	$insert = "INSERT INTO customers (id_user_r,customer_name,customer_last_name,customer_email,telephone,cell_phone,country,date_register,flg_active) VALUES ('".$_SESSION['id_user']."','".$form['customer-name']."','".$form['customer-last-name']."','".$form['customer-email']."','".$form['customer-telephone']."','".$form['customer-phone']."','".$form['customer-country']."','".date('Y-m-d H:i')."','1')";
    	$result = $this->connect->query($insert);
    	$last_id = $this->connect->insert_id;
    	if($result) {
    		$insert_debts = $this->connect->query("INSERT INTO debts (id_customer,company_name,debts) VALUES ('".$last_id."','".$form['company-name']."','".$form['debts']."')");
  			if($insert_debts) {
  				header('Location: ../customer.php?create_customer');
  			} else { echo 'Error insert debts';}
    	} else { echo 'Error insert customer'; }
    	$this->connect->close();
    }

    public function recently_clients() {
    	header('Content-Type: application/json');
    	$select_clients = "SELECT * FROM customers INNER JOIN  login ON customers.id_user_r = login.id_login WHERE customers.flg_active = '1'";
    	$result_clients = $this->connect->query($select_clients); 
    	$data_clients = [];
    	while($row=$result_clients->fetch_assoc()) {
    		$data_clients[] = $row;
    	}
    	echo json_encode($data_clients);
    }

    public function view_customer($id) {
    	$id = preg_replace('/[^[:alnum:]_]/', '',$id); //Filter id

        $select_customer = "SELECT * FROM customers INNER JOIN login ON customers.id_user_r = login.id_login INNER JOIN debts ON customers.id_user = debts.id_customer WHERE customers.id_user = '$id' AND customers.flg_active = '1'";
        $result = $this->connect->query($select_customer);
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $debts = explode(',', $row['debts']);
            $total = array_sum($debts);

            $html = "<div class='card'>";
            $html .= "<div class='card-header'>";
            $html .= $row['customer_name'];
            $html .= "</div>";
            $html .= "<div class='card-body'>";
            $html .= "<h3>Customer Information</h3>";
            $html .= "<p><b>Customer Name: </b>".$row['customer_name']."</p>";
            $html .= "<p><b>Customer Last Name: </b>".$row['customer_last_name']."</p>";
            $html .= "<p><b>Customer Email: </b>".$row['customer_email']."</p>";
            $html .= "<p><b>Telephone: </b>".$row['telephone']."</p>";
            $html .= "<p><b>Country: </b>".$row['country']."</p>";
            $html .= "<p><b>Date Register: </b>".$row['date_register']."</p>";
            $html .= "<hr>";
            $html .= "<h3>Customer debts</h3>";
            $html .= "<p><b>Debt companies: </b>".$row['company_name']."</p>";
            $html .= "<p><b>Total Debt: </b> $".$total."</p>";
            $html .= "</div>";
            $html.= "</div>";

            echo $html;
        } else { header('Location: home.php'); }
    }

    public function my_clients($id) {
        $id = preg_replace('/[^[:alnum:]_]/', '',$id); //Filter id

        $query = $this->connect->query("SELECT * FROM customers WHERE id_user_r = '$id' AND flg_active = '1'");
        if($query->num_rows > 0) {
            while($row = $query->fetch_assoc()) {
                $html = "<tr>";
                $html .= "<th scope='row'>".$row['id_user']."</th>";
                $html .= "<td>".$row['customer_name']."</td>";
                $html .= "<td>".$row['customer_last_name']."</td>";
                $html .= "<td>".$row['date_register']."</td>";
                $html .= "<td><a href='view.php?id=".$row['id_user']."' type='button' class='btn btn-primary'>View</a>  <a href='edit.php?edit=".$row['id_user']."' type='button' class='btn btn-primary'>Edit</a>  <a href='src/action.php?delete=".$row['id_user']."' type='button' class='btn btn-danger'>Delete</a></td>";
                $html .= "</tr>";

                echo $html;
            }
        } else {
            echo "Sem resultados"; 
        }
    }

    public function edit($id) {
        $id = preg_replace('/[^[:alnum:]_]/', '',$id); //Filter id

        $edit_query = $this->connect->query("SELECT * FROM customers INNER JOIN debts ON customers.id_user = debts.id_customer WHERE customers.id_user = '$id'");
        if($edit_query->num_rows > 0) {
            $row = $edit_query->fetch_assoc();
            //Form edit
            $html = "<form method='POST' action='src/action.php' id='customer_user'>";
            $html .= "<input type='hidden' name='_edit' value='".$row['id_user']."'>";
            $html .= "<div class='form-group'>";
            $html .= "<label><b class='required'>*</b> Customer name</label>";
            $html .= "<input type='text' class='form-control' name='customer-name' value='".$row['customer_name']."'>";            
            $html .= "</div>";
            $html .= "<div class='form-group'>";
            $html .= "<label><b class='required'>*</b> Customer last name</label>";
            $html .= "<input type='text' class='form-control' name='customer-last-name' value='".$row['customer_last_name']."'>";            
            $html .= "</div>";
            $html .= "<div class='form-group'>";
            $html .= "<label><b class='required'>*</b> Customer Email</label>";
            $html .= "<input type='text' class='form-control' name='customer-email' value='".$row['customer_email']."'>";            
            $html .= "</div>";
            $html .= "<div class='form-group'>";
            $html .= "<label><b class='required'>*</b> Telephone</label>";
            $html .= "<input type='text' class='form-control' name='customer-telephone' value='".$row['telephone']."'>";            
            $html .= "</div>";
            $html .= "<div class='form-group'>";
            $html .= "<label> Cell phone</label>";
            $html .= "<input type='text' class='form-control' name='customer-phone' value='".$row['cell_phone']."'>";            
            $html .= "</div>";
            $html .= "<div class='form-group'>";
            $html .= "<label><b class='required'>*</b> Country</label>";
            $html .= "<input type='text' class='form-control' name='customer-country' value='".$row['country']."'>";            
            $html .= "</div>";
            $html .= "<h3>Debts Customer</h3>";
            $html .= "<div class='form-group'>";
            $html .= "<label><b class='required'>*</b> Company Name</label>";
            $html .= "<input type='text' class='form-control' name='company-name' value='".$row['company_name']."'>";            
            $html .= "</div>";
            $html .= "<div class='form-group'>";
            $html .= "<label><b class='required'>*</b> Debts (enter the value of debts separated by commas, only whole numbers)</label>";
            $html .= "<input type='text' class='form-control' name='debts' value='".$row['debts']."'>";            
            $html .= "</div>";
            $html .= "<div class='form-group'>";
            $html .= "<button type='submit' class='btn btn-primary'>Save</button>";            
            $html .= "</div>";
            $html .= "</form>";

            echo $html;
        } else {
            header('Location: home.php');
        }
    }

    public function update_form_edit($form) {
        var_dump($form);
        $id = $form['_edit'];
        $name = $form['customer-name'];
        $last_name = $form['customer-last-name'];
        $email = $form['customer-email'];
        $telephone = $form['customer-telephone'];
        $cell_phone = $form['customer-phone'];
        $country = $form['customer-country'];
        $company = $form['company-name'];
        $debts = $form['debts'];

        $update_form_customer = "UPDATE customers SET customer_name = '$name', customer_last_name = '$last_name', customer_email = '$email', telephone = 'telephone', cell_phone = 'cell_phone', country = '$country' WHERE id_user = '$id' AND flg_active = '1'";
        $update_form_debts = "UPDATE debts SET company_name = '$company', debts = '$debts' WHERE id_customer = '$id'";

        $result = $this->connect->query($update_form_customer);

        if($result) {
            $result_debts = $this->connect->query($update_form_debts);
            if($result_debts) {
                header('Location: ../edit.php?edit='.$id.'&success');
            }
        } else {
            echo "Error";
        }
    }

    public function delete($id) {
        $id = preg_replace('/[^[:alnum:]_]/', '',$id); //Filter id
        
        $delete_query = $this->connect->query("UPDATE customers SET flg_active = '0' WHERE id_user = '$id'");
        if($delete_query) {
            header('Location: ../manage.php?success');die();
        } else {
            header('Location: ../manage.php?error');die();
        }
    }
}