<?php
/**
 * Plugin Name: VA Disability Back Pay Calculator
 * Plugin URI: https://github.com/sumon665
 * Description: VA Disability Back Pay Calculator
 * Version: 3.0
 * Author: Md Sumon Mia
 * Author URI: https://github.com/sumon665
 */


/* Add css/js file */
function paycal_enqueue() {
    wp_enqueue_style( 'pycal-stye', plugins_url() . '/pay-calculator/main.css', array(),  time() );
    wp_enqueue_script('wcs-ajax-script', plugins_url() . '/pay-calculator/main.js', array('jquery'), time(), true);
    wp_localize_script( 'wcs-ajax-script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ));       
}
add_action( 'wp_enqueue_scripts', 'paycal_enqueue' );


/* Ajax request */
function submit_paycal_request() {

    if ( isset($_POST) ) {

        /* post data value */
        $PostMonths = $_POST['months'];
        $PostYear = $_POST['years'];
        $PostQ2 = $_POST['Q2s'];
        $PostQ3 = $_POST['Q3s'];
        $PostPar = $_POST['parents'];
        $PostChild = $_POST['childs'];
        $PostElChild = $_POST['ElderChilds'];
        $MarSt = $_POST['marital'];
        $spouAid = $_POST['maritalAA'];

        foreach ($PostMonths as $numx => $PostMonth) {
            $months[] = $PostMonth['value'];
            $years[] = $PostYear[$numx]['value'];
            $Q2s[] = $PostQ2[$numx]['value'];
            $Q3s[] = $PostQ3[$numx]['value'];
            $parents[] = $PostPar[$numx]['value'];
            $childs[] = $PostChild[$numx]['value'];
            $elderChilds[] = $PostElChild[$numx]['value'];
        }

        $totalComp = 0;
        $compRec = 0;
        $comDue = 0;

        require_once 'calculation.php';

        $result['totalComp'] = number_format($totalComp, 2, '.', ',');
        $result['compRec'] = number_format($compRec, 2, '.', ',');
        $result['comDue'] = number_format($comDue, 2, '.', ',');

        echo json_encode($result);
        die();
    }
}

add_action( 'wp_ajax_submit_paycal_request', 'submit_paycal_request' );
add_action( 'wp_ajax_nopriv_submit_paycal_request', 'submit_paycal_request' );


/* Shortcode pay calculator form*/
function paycalculator_shortcode() {
    ob_start();
    ?>

<form id="paycalFrm">

<div id="paycalMain">
<div id="paycalWraper">
    <!-- Form Content -->   
    <div class="paycal">
    <div class="content">
        <!-- Left Content -->
        <div class="left_cont">
            <div class="input_content">
                <label>Select the date you filled your claim</label>

                <div class="input_year">
                    <span>
                        <select name="pcMonth" id="pcMonth" class="pcMonth pcSelect" required>
                            <option value="" selected="true" disabled="disabled">Month</option>
                            <option value="0">January</option>
                            <option value="1">February</option>
                            <option value="2">March</option>
                            <option value="3">April</option>
                            <option value="4">May</option>
                            <option value="5">June</option>
                            <option value="6">July</option>
                            <option value="7">August</option>
                            <option value="8">September</option>
                            <option value="9">October</option>
                            <option value="10">November</option>
                            <option value="11">December</option>
                        </select>
                    </span>
                    <span>
                        <select name="pcYear" id="pcYear" class="pcYear pcSelect" required>
                            <option value="" selected="true" disabled="disabled">Year</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                            <option value="1979">1979</option>
                            <option value="1978">1978</option>
                            <option value="1977">1977</option>
                            <option value="1976">1976</option>
                            <option value="1975">1975</option>
                            <option value="1974">1974</option>                            
                        </select>
                    </span>
                </div>
            </div>

            <div class="input_content">
                <label>On this date, what percentage should the VA have been paying you?</label>
                <span>
                <select name="pcPay" id="pcPay" class="pcPay pcSelect">
                        <option value="0" selected="true">0%</option>
                        <option value="10">10%</option>
                        <option value="20">20%</option>
                        <option value="30">30%</option>
                        <option value="40">40%</option>
                        <option value="50">50%</option>
                        <option value="60">60%</option>
                        <option value="70">70%</option>
                        <option value="80">80%</option>
                        <option value="90">90%</option>
                        <option value="100">100%</option>
                    </select>
                </span>
            </div>

            <div class="input_content">
                <label>On this date, what disability percentage was used to determine your payment?</label>
                <span>
                    <select name="pcUse" id="pcUse" class="pcUse pcSelect">
                        <option value="0" selected="true">0%</option>
                        <option value="10">10%</option>
                        <option value="20">20%</option>
                        <option value="30">30%</option>
                        <option value="40">40%</option>
                        <option value="50">50%</option>
                        <option value="60">60%</option>
                        <option value="70">70%</option>
                        <option value="80">80%</option>
                        <option value="90">90%</option>
                        <option value="100">100%</option>
                    </select>
                </span>
            </div>

            <div class="input_content">
                <label>On this date, how many dependent parents did you have?</label>
                <span>
                    <select name="pcPar" id="pcPar" class="pcPar pcSelect">
                        <option selected="true" value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </span>
            </div>

        </div>

        <!-- Right Content -->
        <div class="right_cont">

            <div class="input_content">
                <div class="input_marStatus">
                    <label>On this date, what was your marital status? &nbsp;</label> 
                    <label> 
                        <input type="radio" id="single-status" name="marital" class="marital_status single-status" value="0" checked> Single &nbsp;
                    </label>  
                    <label>
                        <input type="radio" id="married-status" name="marital" class="marital_status married-status" value="1">
                        Married
                    </label>
                </div>
            </div>  

            <div class="input_content">
                <div id="spouse" class="input_marStatus">
                    <label>Does your spouse require aid and addendence? &nbsp;</label> 
                    <label> 
                        <input type="radio" id="noAA" name="maritalAA" class="spouse_option-noAA" value="0"> No &nbsp;
                    </label>  
                    <label>
                        <input type="radio" id="AA" name="maritalAA" class="spouse_option-AA" value="1">
                        Yes
                    </label>
                </div>
            </div>              

            <div class="input_content">
                <label>On this date, how many dependent children did you have who were under the age of 18?</label>
                <span>
                    <select name="pcChild" id="pcChild" class="pcChild pcSelect">
                        <option selected="true" value="0">None</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option> 
                    </select>
                </span>
            </div>

            <div class="input_content">
                <label>On this date, how many dependent children did you have who were between the ages of 18 and 24?</label>
                <span>
                    <select name="pcElChild" id="pcElChild" class="pcElChild pcSelect">
                        <option selected="true" value="0">None</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </span>
            </div>            
        </div>        
        </div>
       </div> 
       <!-- Form End -->
</div>

    <a href="javascript:void(0)" class="add_button">Document an Adjustment to your Benefits</a>
</div>
    <div class="pcResult" id="pcResult" align="center">
        <h3>Total Compensation Received: <span id="total_com_rec">0.00</span></h3>
        <h3>Compensation You Should Have Received: <span id="com_you_rec">0.00</span></h3>
        <h3>Total Compensation You Are Due: <span id="total_com_due">0.00</span></h3>        
    </div>    

    <div class="paycal_btn" align="center">
        <input type="hidden" name="PayCal" value='1'>
        <!-- <input type="submit" id="submit_paycal" value="Submit"> -->
        <button type="submit" id="submit_paycal">Submit</button>
        <button type="button" id="pcReset">Reset All Factors</button>
    </div>

</form>
    <?php
    return ob_get_clean();
}

add_shortcode( 'pacalculator', 'paycalculator_shortcode' );


