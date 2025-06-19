<?php    
    function search_entries_filter()
    {
        return <<<EOD
            <div class="d-flex gap-5 flex-wrap">
                <div>
                    <label for="table">Table:</label>
                    <select class="form-select border-dark" id="table" required>
                        <option value="saturday" selected>Saturday</option>
                        <option value="sunday">Sunday</option>
                    </select>
                </div>
                <div>
                    <label for="form-address">Address:</label>
                    <input type="text" id="form-address" class="form-control border-dark" placeholder="Enter address">
                </div>
                <div>
                    <label for="form-town">Town:</label>
                    <select class="form-select border-dark" id="form-town">
                        <option value="" selected>Both</option>   
                        <option value="Maplewood">Maplewood</option>
                        <option value="South Orange">South Orange</option>
                    </select>
                </div>
                <div>
                    <label for="applicant-email">Email:</label>
                    <input type="email" id="applicant-email" class="form-control border-dark" placeholder="Enter email">
                </div>
                <div>
                    <label for="form-phone">Phone:</label>
                    <input type="text" id="form-phone" class="form-control border-dark" placeholder="Enter phone number" maxlength="10" pattern="[0-9]{10}">
                </div>
                <div>
                    <label for="applicant-name">Name:</label>
                    <input type="text" id="applicant-name" class="form-control border-dark" placeholder="Enter name">
                </div>
                <div>
                    <label for="time">Time:</label>
                    <select class="form-select border-dark" id="time">
                        <option value="" selected>Select Value</option>   
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="9:15 AM">9:15 AM</option>
                        <option value="9:30 AM">9:30 AM</option>
                        <option value="9:45 AM">9:45 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="10:15 AM">10:15 AM</option>
                    </select>
                </div>
                <div>
                    <label for="form-c_status">Confirmation Status:</label>
                    <select class="form-select border-dark" id="form-c_status">
                        <option value="" selected>Select Value</option>   
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div>
                    <label for="form-w_status">Win Status:</label>
                    <select class="form-select border-dark" id="form-w_status">
                        <option value="" selected>Select Value</option>   
                        <option value="Win">Win</option>
                        <option value="Waitlisted">Waitlisted</option>
                        <option value="Declined">Declined</option>
                        <option value="Lose">Lose</option>
                    </select>
                </div>
                <div>
                    <label for="form-location">CHS Alumni Location</label>
                    <select class="form-select border-dark" id="form-location">
                        <option value="" selected>Select Value</option>   
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div>
                    <label for="form-help">Wants Help Setting Up Their Canopy</label>
                    <select class="form-select border-dark" id="form-help">
                        <option value="" selected>Select Value</option>   
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div>
                    <label for="form-payment_confirm">PayPal Payment Confirmed</label>
                    <select class="form-select border-dark" id="form-payment_confirm">
                        <option value="" selected>Select Value</option>   
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div>
                    <label for="form-payment_id">PayPal Transaction ID</label>
                    <input type="text" id="form-transaction_id" class="form-control border-dark" placeholder="Enter ID">
                </div>
                <div>
                    <label for="form-slot">Slot:</label>
                    <input type="text" id="form-slot" class="form-control border-dark" placeholder="Enter slot">
                </div>
                <div>
                    <label for="form-payment_confirm">Number of Entries Per Table Page</label>
                    <select class="form-select border-dark" id="form-entries-limit">
                        <option value="0" selected>Unlimited</option>   
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                    </select>
                </div>
                <button class="btn btn-success search-entries-option text-light rounded" id="contact-selected" style="width: 214px;">
                    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.60952 0C3.86453 0 0 3.86453 0 8.60952V27.5505C0 32.2955 3.86453 36.16 8.60952 36.16H27.5505C32.2955 36.16 36.16 32.2955 36.16 27.5505V8.60952C36.16 3.86453 32.2955 0 27.5505 0H8.60952ZM7.74857 10.3314H28.4114C28.5664 10.3314 28.7126 10.3489 28.8503 10.392L20.3871 18.8468C19.1129 20.121 17.0387 20.121 15.7645 18.8468L7.30969 10.392C7.44744 10.3489 7.5936 10.3314 7.74857 10.3314ZM6.0872 11.6145L12.5612 18.08L6.0872 24.5456C6.04415 24.4078 6.02667 24.2616 6.02667 24.1067V12.0533C6.02667 11.8984 6.04415 11.7522 6.0872 11.6145ZM30.0728 11.6145C30.1159 11.7522 30.1333 11.8984 30.1333 12.0533V24.1067C30.1333 24.2616 30.1158 24.4078 30.0728 24.5456L23.5904 18.08L30.0728 11.6145ZM13.7752 19.2941L14.542 20.0693C15.5149 21.0422 16.7974 21.5238 18.0716 21.5238C19.3544 21.5238 20.6283 21.0422 21.6012 20.0693L22.3764 19.2941L28.8503 25.768C28.7126 25.8111 28.5664 25.8286 28.4114 25.8286H7.74857C7.5936 25.8286 7.44744 25.8111 7.30969 25.768L13.7752 19.2941Z" fill="white"/>
                    </svg>
                    Contact Selected
                </button>
                <button class="btn btn-danger search-entries-option text-light rounded" id="delete-selected" style="width: 214px;">
                    <svg width="25" height="34" viewBox="0 0 25 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.41268 0C8.31079 0 7.40259 0.908207 7.40259 2.0101V3.35016H2.16796C2.08421 3.33446 2.00045 3.33446 1.9167 3.35016H0.702268C0.681329 3.35016 0.660391 3.35016 0.639452 3.35016C0.270412 3.36848 -0.0174931 3.68256 0.000828246 4.0516C0.0191496 4.42064 0.333227 4.70854 0.702268 4.69022H1.43512L3.84304 31.8265C3.9268 32.7635 4.72508 33.5016 5.66469 33.5016H18.5209C19.4605 33.5016 20.2588 32.7635 20.3426 31.8265L22.7505 4.69022H23.4834C23.7241 4.69284 23.9492 4.56721 24.0722 4.35782C24.1926 4.14844 24.1926 3.89194 24.0722 3.68256C23.9492 3.47317 23.7241 3.34754 23.4834 3.35016H16.783V2.0101C16.783 0.908207 15.8748 0 14.7729 0H9.41268ZM9.41268 1.34006H14.7729C15.1498 1.34006 15.443 1.6332 15.443 2.0101V3.35016H8.74265V2.0101C8.74265 1.6332 9.03579 1.34006 9.41268 1.34006ZM2.77518 4.69022H21.4104L19.0025 31.7218C18.9816 31.9548 18.7329 32.1615 18.5209 32.1615H5.66469C5.45269 32.1615 5.20404 31.9548 5.18311 31.7218L2.77518 4.69022ZM8.0098 6.67938C7.98101 6.68462 7.95222 6.69247 7.92605 6.70032C7.61459 6.77099 7.39473 7.05104 7.40259 7.37035V29.4814C7.39997 29.7222 7.5256 29.9473 7.73499 30.0703C7.94437 30.1907 8.20087 30.1907 8.41025 30.0703C8.61964 29.9473 8.74527 29.7222 8.74265 29.4814V7.37035C8.7505 7.17667 8.67198 6.99084 8.53327 6.85997C8.39193 6.72649 8.20087 6.66106 8.0098 6.67938ZM12.03 6.67938C12.0012 6.68462 11.9724 6.69247 11.9462 6.70032C11.6348 6.77099 11.4149 7.05104 11.4228 7.37035V29.4814C11.4202 29.7222 11.5458 29.9473 11.7552 30.0703C11.9646 30.1907 12.2211 30.1907 12.4304 30.0703C12.6398 29.9473 12.7655 29.7222 12.7628 29.4814V7.37035C12.7707 7.17667 12.6922 6.99084 12.5535 6.85997C12.4121 6.72649 12.2211 6.66106 12.03 6.67938ZM16.0502 6.67938C16.0214 6.68462 15.9926 6.69247 15.9664 6.70032C15.655 6.77099 15.4351 7.05104 15.443 7.37035V29.4814C15.4404 29.7222 15.566 29.9473 15.7754 30.0703C15.9848 30.1907 16.2412 30.1907 16.4506 30.0703C16.66 29.9473 16.7857 29.7222 16.783 29.4814V7.37035C16.7909 7.17667 16.7124 6.99084 16.5736 6.85997C16.4323 6.72649 16.2412 6.66106 16.0502 6.67938Z" fill="white"/>
                    </svg>
                    Delete Selected
                </button>
                <button class="btn btn-primary search-entries-option text-light rounded" id="submit-filter">
                    <svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.9341 0C5.33634 0 0 5.33634 0 11.9341C0 18.5319 5.33634 23.8682 11.9341 23.8682C14.2897 23.8682 16.4697 23.1772 18.318 22.0035L26.9395 30.625L29.923 27.6415L21.4112 19.1516C22.9413 17.1443 23.8682 14.6571 23.8682 11.9341C23.8682 5.33634 18.5319 0 11.9341 0ZM11.9341 2.80802C16.988 2.80802 21.0602 6.8802 21.0602 11.9341C21.0602 16.988 16.988 21.0602 11.9341 21.0602C6.8802 21.0602 2.80802 16.988 2.80802 11.9341C2.80802 6.8802 6.8802 2.80802 11.9341 2.80802Z" fill="white"/>
                    </svg>
                    Filter
                </button>
                <button class="btn btn-success text-light rounded" id="apply-changes-top">
                    <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.3705 7.48303L9.3098 14.5435L6.6301 11.8633C6.45093 11.6839 6.1605 11.6839 5.98133 11.8629C5.80217 12.0423 5.80217 12.3327 5.98133 12.5119L9.31003 15.8412L17.0193 8.13156C17.1984 7.95286 17.1984 7.6622 17.0193 7.48303C16.8401 7.30364 16.5497 7.30364 16.3705 7.48303ZM11.4999 0C5.15868 0 0 5.15891 0 11.4993C0.000458814 17.8405 5.15937 22.9997 11.5004 22.9997H11.5013C17.8417 22.9997 22.9999 17.8405 22.9999 11.4993C22.9999 5.15868 17.8412 0 11.4999 0ZM11.5013 22.082H11.5004C5.66544 22.082 0.918087 17.3347 0.917628 11.4993C0.917628 5.66452 5.66475 0.917628 11.4999 0.917628C17.3351 0.917628 22.0823 5.66475 22.0823 11.4993C22.0823 17.3347 17.3358 22.082 11.5013 22.082Z" fill="white"/>
                    </svg>                
                    Apply Changes
                </button>
            </div>
        EOD;
    }

    function search_entries_table()
    {
        global $wpdb;
        $site_url = get_site_url();
        return <<<EOD
            <div style="max-width: 1600px">
                <div class="overflow-scroll">    
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col" id="select_all">
                                    <div class="border border-dark rounded border-5 d-flex justify-content-center" onclick="selectAll()" style="width: 43px; height: 43px;" id="select_all">
                                        <svg width="31" height="27" viewBox="0 0 31 27" fill="none" xmlns="http://www.w3.org/2000/svg" class="d-none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.86364 21.14L2.46591 12.7638L0 15.5558L9.86364 26.7241L31 2.79207L28.5341 0L9.86364 21.14Z" fill="#212529"/>
                                        </svg>                          
                                    </div>
                                </th>
                                <th scope="col" id="slot">
                                    Slot
                                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="down_arrow">
                                        <path d="M0.145 1.25355L0.235 1.36013L7.035 9.30267C7.265 9.57165 7.61 9.73913 7.995 9.73913C8.38 9.73913 8.725 9.56658 8.955 9.30267L15.75 1.37535L15.865 1.2434C15.95 1.11652 16 0.96427 16 0.801867C16 0.360333 15.63 0 15.17 0H0.83C0.37 0 0 0.360333 0 0.801867C0 0.969346 0.0550001 1.12667 0.145 1.25355Z" fill="black"/>
                                    </svg>
                                </th>
                                <th scope="col" id="name">
                                    Name
                                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="down_arrow">
                                        <path d="M0.145 1.25355L0.235 1.36013L7.035 9.30267C7.265 9.57165 7.61 9.73913 7.995 9.73913C8.38 9.73913 8.725 9.56658 8.955 9.30267L15.75 1.37535L15.865 1.2434C15.95 1.11652 16 0.96427 16 0.801867C16 0.360333 15.63 0 15.17 0H0.83C0.37 0 0 0.360333 0 0.801867C0 0.969346 0.0550001 1.12667 0.145 1.25355Z" fill="black"/>
                                    </svg>
                                </th>
                                <th scope="col" id="address">
                                    Address
                                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="down_arrow">
                                        <path d="M0.145 1.25355L0.235 1.36013L7.035 9.30267C7.265 9.57165 7.61 9.73913 7.995 9.73913C8.38 9.73913 8.725 9.56658 8.955 9.30267L15.75 1.37535L15.865 1.2434C15.95 1.11652 16 0.96427 16 0.801867C16 0.360333 15.63 0 15.17 0H0.83C0.37 0 0 0.360333 0 0.801867C0 0.969346 0.0550001 1.12667 0.145 1.25355Z" fill="black"/>
                                    </svg>
                                </th>
                                <th scope="col" id="town">
                                    Town
                                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="down_arrow">
                                        <path d="M0.145 1.25355L0.235 1.36013L7.035 9.30267C7.265 9.57165 7.61 9.73913 7.995 9.73913C8.38 9.73913 8.725 9.56658 8.955 9.30267L15.75 1.37535L15.865 1.2434C15.95 1.11652 16 0.96427 16 0.801867C16 0.360333 15.63 0 15.17 0H0.83C0.37 0 0 0.360333 0 0.801867C0 0.969346 0.0550001 1.12667 0.145 1.25355Z" fill="black"/>
                                    </svg>
                                </th>
                                <th scope="col" id="email">
                                    Email
                                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="down_arrow">
                                        <path d="M0.145 1.25355L0.235 1.36013L7.035 9.30267C7.265 9.57165 7.61 9.73913 7.995 9.73913C8.38 9.73913 8.725 9.56658 8.955 9.30267L15.75 1.37535L15.865 1.2434C15.95 1.11652 16 0.96427 16 0.801867C16 0.360333 15.63 0 15.17 0H0.83C0.37 0 0 0.360333 0 0.801867C0 0.969346 0.0550001 1.12667 0.145 1.25355Z" fill="black"/>
                                    </svg>  
                                </th>
                                <th scope="col" id="phone">
                                    Phone
                                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="down_arrow"">
                                        <path d="M0.145 1.25355L0.235 1.36013L7.035 9.30267C7.265 9.57165 7.61 9.73913 7.995 9.73913C8.38 9.73913 8.725 9.56658 8.955 9.30267L15.75 1.37535L15.865 1.2434C15.95 1.11652 16 0.96427 16 0.801867C16 0.360333 15.63 0 15.17 0H0.83C0.37 0 0 0.360333 0 0.801867C0 0.969346 0.0550001 1.12667 0.145 1.25355Z" fill="black"/>
                                    </svg>
                                </th>
                                <th scope="col" id="win_status">
                                    Win Status
                                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="down_arrow">
                                        <path d="M0.145 1.25355L0.235 1.36013L7.035 9.30267C7.265 9.57165 7.61 9.73913 7.995 9.73913C8.38 9.73913 8.725 9.56658 8.955 9.30267L15.75 1.37535L15.865 1.2434C15.95 1.11652 16 0.96427 16 0.801867C16 0.360333 15.63 0 15.17 0H0.83C0.37 0 0 0.360333 0 0.801867C0 0.969346 0.0550001 1.12667 0.145 1.25355Z" fill="black"/>
                                    </svg>    
                                </th>
                                <th scope="col" id="arrival_time">
                                    Arrival Time
                                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="down_arrow">
                                        <path d="M0.145 1.25355L0.235 1.36013L7.035 9.30267C7.265 9.57165 7.61 9.73913 7.995 9.73913C8.38 9.73913 8.725 9.56658 8.955 9.30267L15.75 1.37535L15.865 1.2434C15.95 1.11652 16 0.96427 16 0.801867C16 0.360333 15.63 0 15.17 0H0.83C0.37 0 0 0.360333 0 0.801867C0 0.969346 0.0550001 1.12667 0.145 1.25355Z" fill="black"/>
                                    </svg>
                                </th>
                                <th scope="col" id="chs_alumni_location">
                                    CHS Alumni Location
                                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="down_arrow">
                                        <path d="M0.145 1.25355L0.235 1.36013L7.035 9.30267C7.265 9.57165 7.61 9.73913 7.995 9.73913C8.38 9.73913 8.725 9.56658 8.955 9.30267L15.75 1.37535L15.865 1.2434C15.95 1.11652 16 0.96427 16 0.801867C16 0.360333 15.63 0 15.17 0H0.83C0.37 0 0 0.360333 0 0.801867C0 0.969346 0.0550001 1.12667 0.145 1.25355Z" fill="black"/>
                                    </svg>
                                </th>
                                <th scope="col" id="setup_help">
                                    Canopy Help
                                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="down_arrow">
                                        <path d="M0.145 1.25355L0.235 1.36013L7.035 9.30267C7.265 9.57165 7.61 9.73913 7.995 9.73913C8.38 9.73913 8.725 9.56658 8.955 9.30267L15.75 1.37535L15.865 1.2434C15.95 1.11652 16 0.96427 16 0.801867C16 0.360333 15.63 0 15.17 0H0.83C0.37 0 0 0.360333 0 0.801867C0 0.969346 0.0550001 1.12667 0.145 1.25355Z" fill="black"/>
                                    </svg>   
                                </th>
                                <th scope="col" id="payment_confirmed">
                                    Payment Confirmed
                                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="down_arrow">
                                        <path d="M0.145 1.25355L0.235 1.36013L7.035 9.30267C7.265 9.57165 7.61 9.73913 7.995 9.73913C8.38 9.73913 8.725 9.56658 8.955 9.30267L15.75 1.37535L15.865 1.2434C15.95 1.11652 16 0.96427 16 0.801867C16 0.360333 15.63 0 15.17 0H0.83C0.37 0 0 0.360333 0 0.801867C0 0.969346 0.0550001 1.12667 0.145 1.25355Z" fill="black"/>
                                    </svg>   
                                </th>
                                <th scope="col" id="paypal_transaction_id">
                                    PayPal Transaction ID
                                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="down_arrow">
                                        <path d="M0.145 1.25355L0.235 1.36013L7.035 9.30267C7.265 9.57165 7.61 9.73913 7.995 9.73913C8.38 9.73913 8.725 9.56658 8.955 9.30267L15.75 1.37535L15.865 1.2434C15.95 1.11652 16 0.96427 16 0.801867C16 0.360333 15.63 0 15.17 0H0.83C0.37 0 0 0.360333 0 0.801867C0 0.969346 0.0550001 1.12667 0.145 1.25355Z" fill="black"/>
                                    </svg>   
                                </th>
                                <th scope="col" id="confirmation_status">
                                    Confirmation Status
                                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="down_arrow">
                                        <path d="M0.145 1.25355L0.235 1.36013L7.035 9.30267C7.265 9.57165 7.61 9.73913 7.995 9.73913C8.38 9.73913 8.725 9.56658 8.955 9.30267L15.75 1.37535L15.865 1.2434C15.95 1.11652 16 0.96427 16 0.801867C16 0.360333 15.63 0 15.17 0H0.83C0.37 0 0 0.360333 0 0.801867C0 0.969346 0.0550001 1.12667 0.145 1.25355Z" fill="black"/>
                                    </svg>   
                                </th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                        </tbody>
                    </table>
                </div>
                <div>
                    <div class="position-relative d-none pt-3 pb-5" id="table-buttons">
                        <button class="btn btn-success position-absolute text-light start-0 rounded below-table-option" id="apply-changes">
                            <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.3705 7.48303L9.3098 14.5435L6.6301 11.8633C6.45093 11.6839 6.1605 11.6839 5.98133 11.8629C5.80217 12.0423 5.80217 12.3327 5.98133 12.5119L9.31003 15.8412L17.0193 8.13156C17.1984 7.95286 17.1984 7.6622 17.0193 7.48303C16.8401 7.30364 16.5497 7.30364 16.3705 7.48303ZM11.4999 0C5.15868 0 0 5.15891 0 11.4993C0.000458814 17.8405 5.15937 22.9997 11.5004 22.9997H11.5013C17.8417 22.9997 22.9999 17.8405 22.9999 11.4993C22.9999 5.15868 17.8412 0 11.4999 0ZM11.5013 22.082H11.5004C5.66544 22.082 0.918087 17.3347 0.917628 11.4993C0.917628 5.66452 5.66475 0.917628 11.4999 0.917628C17.3351 0.917628 22.0823 5.66475 22.0823 11.4993C22.0823 17.3347 17.3358 22.082 11.5013 22.082Z" fill="white"/>
                            </svg>                
                            Apply Changes
                        </button>
                        <nav class="position-absolute start-50 top-50 pt-5 translate-middle">
                            <ul class="pagination" id="paginator">
                            </ul>
                        </nav>
                        <button class="btn btn-warning position-absolute text-light end-0 rounded below-table-option" id="export">
                            <svg width="26" height="30" viewBox="0 0 26 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.1786 23.1786V27.3929H2.10714V23.1786H0V27.3929L0.00800696 27.3877C0.00700921 27.6643 0.0605285 27.9383 0.165505 28.1942C0.270481 28.4501 0.424856 28.6827 0.619805 28.8789C0.814754 29.0751 1.04645 29.2309 1.30166 29.3375C1.55687 29.4441 1.83058 29.4993 2.10714 29.5H23.1786C23.7374 29.5 24.2734 29.278 24.6685 28.8828C25.0637 28.4877 25.2857 27.9517 25.2857 27.3929V23.1786H23.1786Z" fill="white"/>
                                <path d="M2.10718 10.5357L3.59377 12.016L11.5893 4.02991V23.1786H13.6965V4.02991L21.6941 12.016L23.1786 10.5357L12.6429 0L2.10718 10.5357Z" fill="white"/>
                            </svg>       
                            Export
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal" id="applied" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" id="close-smodal"></button>
                        </div>
                        <div class="modal-body">
                            <h1>Changes Successfully Applied to the Database!</h1>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="failed" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" id="close-fmodal"></button>
                        </div>
                        <div class="modal-body">
                            <h1 class="font-weight-bold text-danger">There was an error in applying your changes!</h1>
                            <h3 id="error-message"></h3>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="download" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" id="close-dmodal"></button>
                        </div>
                        <div class="modal-body d-flex flex-column align-items-center">
                            <h1 class="font-weight-bold">Download Spreadsheet</h1>
                            <button class="btn btn-warning text-light end-0 rounded below-table-option" id="download-xl">
                                <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M43.0833 6.41663H22V37.5833H43.0833V6.41663Z" fill="white"/>
                                    <path d="M43.0833 38.5H24.7499C24.2432 38.5 23.8333 38.09 23.8333 37.5833C23.8333 37.0767 24.2432 36.6667 24.7499 36.6667H42.1666V7.33333H24.7499C24.2432 7.33333 23.8333 6.92334 23.8333 6.41667C23.8333 5.90999 24.2432 5.5 24.7499 5.5H43.0833C43.5899 5.5 43.9999 5.90999 43.9999 6.41667V37.5833C43.9999 38.09 43.5899 38.5 43.0833 38.5Z" fill="#177848"/>
                                    <path d="M25.6667 0L0 4.78261V39.2174L25.6667 44V0Z" fill="#177848"/>
                                    <path opacity="0.2" d="M0 4.78262V5.24096L25.6667 0.458333V0L0 4.78262Z" fill="white"/>
                                    <path d="M31.1666 9.16663H23.8333V12.8333H31.1666V9.16663Z" fill="#177848"/>
                                    <path d="M40.3333 9.16663H33V12.8333H40.3333V9.16663Z" fill="#177848"/>
                                    <path d="M31.1666 14.6666H23.8333V18.3333H31.1666V14.6666Z" fill="#177848"/>
                                    <path d="M40.3333 14.6666H33V18.3333H40.3333V14.6666Z" fill="#177848"/>
                                    <path d="M31.1666 20.1666H23.8333V23.8333H31.1666V20.1666Z" fill="#177848"/>
                                    <path d="M40.3333 20.1666H33V23.8333H40.3333V20.1666Z" fill="#177848"/>
                                    <path d="M31.1666 25.6666H23.8333V29.3333H31.1666V25.6666Z" fill="#177848"/>
                                    <path d="M40.3333 25.6666H33V29.3333H40.3333V25.6666Z" fill="#177848"/>
                                    <path d="M31.1666 31.1666H23.8333V34.8333H31.1666V31.1666Z" fill="#177848"/>
                                    <path d="M40.3333 31.1666H33V34.8333H40.3333V31.1666Z" fill="#177848"/>
                                    <path opacity="0.1" d="M0 39.2175L25.6667 44.0001V43.5418L0 38.7592V39.2175Z" fill="black"/>
                                    <path d="M43.0834 38.5C43.5901 38.5 44.0001 38.09 44.0001 37.5833V23.8333L25.6667 5.5V38.5H43.0834Z" fill="url(#paint0_linear_92_112)"/>
                                    <path d="M13.4892 22.9167L17.7015 15.3345L17.6483 15.3049L14.4462 15.5337L11.9168 20.0864L9.58051 15.8812L6.55591 16.0972L10.3444 22.9167L6.55591 29.7362L9.58051 29.9521L11.9168 25.7469L14.4462 30.2997L17.6483 30.5284L17.7015 30.4989L13.4892 22.9167Z" fill="white"/>
                                    <path opacity="0.05" d="M25.6667 0L0 4.78261V39.2174L25.6667 44V0Z" fill="url(#paint1_linear_92_112)"/>
                                    <path d="M43.0833 5.5H25.6667V0L0 4.78262V39.2174L25.6667 44V38.5H43.0833C43.59 38.5 44 38.09 44 37.5833V6.41667C44 5.90999 43.59 5.5 43.0833 5.5Z" fill="url(#paint2_linear_92_112)"/>
                                    <defs>
                                        <linearGradient id="paint0_linear_92_112" x1="17.4167" y1="13.75" x2="42.8151" y2="39.1483" gradientUnits="userSpaceOnUse">
                                            <stop stop-opacity="0.1"/>
                                            <stop offset="1" stop-opacity="0"/>
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_92_112" x1="-0.00149513" y1="21.999" x2="25.6668" y2="21.999" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="white"/>
                                            <stop offset="1"/>
                                        </linearGradient>
                                        <linearGradient id="paint2_linear_92_112" x1="-2.86633" y1="10.9295" x2="45.9166" y2="33.6773" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="white" stop-opacity="0.2"/>
                                            <stop offset="1" stop-color="white" stop-opacity="0"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                                Download
                            </button>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="delete-confirm" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        </div>
                        <div class="modal-body">
                            <h1 class="font-weight-bold text-danger text-center">Are you sure you want to delete these entries?</h1>
                            <div class="position-relative" style="height: 50px;">
                                <button class="btn btn-primary search-entries-option text-light rounded position-absolute start-0" id="cancel">
                                    Cancel
                                </button>
                                <button class="btn btn-light search-entries-option text-dark border-dark rounded position-absolute end-0" id="delete">
                                    Delete
                                </button>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="entries-deleted" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" id="close-delModal"></button>
                        </div>
                        <div class="modal-body">
                            <h1 class="font-weight-bold">Entries Deleted</h1>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var selectedCol = document.getElementById('slot');
                var selectedAppRows = [];
                var selectedRows = [];
                const prefix = '$wpdb->prefix';
                var changes = [];
                var order = '';
                var category = '';
                const table = document.getElementById("table");
                const address = document.getElementById("form-address");
                const town = document.getElementById("form-town");
                const phone = document.getElementById("form-phone");
                const applicant_email = document.getElementById("applicant-email");
                const applicant_name = document.getElementById("applicant-name");
                const input_location = document.getElementById("form-location");
                const input_c_status = document.getElementById("form-c_status");
                const input_w_status = document.getElementById("form-w_status");
                const input_slot = document.getElementById("form-slot");
                const input_time = document.getElementById("time");
                const input_help = document.getElementById("form-help");
                const input_payment_confirmed = document.getElementById("form-payment_confirm");
                const input_transaction_id = document.getElementById("form-transaction_id");
                const table_body = document.getElementById('table-body');
                const entries_limit = document.getElementById("form-entries-limit");
                
                function selectRow(e) {
                    const row = e.parentNode.parentNode;
                    const appId = row.id.split(" ")[0];
                    
                    if (e.classList.contains("selected")) {
                        selectedRows.splice(selectedRows.indexOf(row.id), 1);
                        selectedAppRows.splice(selectedAppRows.indexOf(appId), 1);
                        e.classList.remove("selected");
                        row.classList.remove("bg-success");
                        e.querySelector("svg").classList.add("d-none");
                    }
                    else {
                        selectedRows.push(row.id);
                        selectedAppRows.push(appId);
                        e.classList.add("selected");
                        row.classList.add("bg-success");
                        e.querySelector("svg").classList.remove("d-none");
                    }
                }

                function selectAll() {
                    const select_all_box = document.getElementById("select_all");

                    const selector = "";
                    
                    if (select_all_box.classList.contains("selected")) {
                        select_all_box.classList.remove("selected");
                        select_all_box.classList.remove("bg-success");
                        select_all_box.querySelector("svg").classList.add("d-none");

                        class_name = ".selected";
                    }
                    else {
                        select_all_box.classList.add("selected");
                        select_all_box.classList.add("bg-success");
                        select_all_box.querySelector("svg").classList.remove("d-none");

                        class_name = ".entry_select_box:not(.selected)";
                    }

                    const entry_boxes = table_body.querySelectorAll(class_name);
                    entry_boxes.forEach(entry_box => selectRow(entry_box));
                }

                function editEntry(tableIndicator, col, e) {
                    const tabName = tableIndicator === "day" ? table.value : 'applicants';
                    const row_id = e.parentNode.parentNode.id;
                    const ids = row_id.split(" ");
                    const id = tableIndicator === "day" ? ids[1] : ids[0];
                    const value = e.value == "" ? null : e.value;

                    changes.push({
                        id: id,
                        table: tabName,
                        col: col,
                        value: value
                    });
                }

                function convertBool(value) {
                    var string = "";
                    
                    if (value == 0) {
                        string = "No";
                    }
                    else if (value == 1) {
                        string = "Yes";
                    }
                    else {
                        string = "";
                    }

                    return string;
                }

                async function fillTable(sort_category, asc, limit, offset = 0, switchPage = false) {
                    const order = asc ? 'ASC' : 'DESC';
                    const category = sort_category;
                    const tableVal = table.value;
                    const addressVal = address.value;
                    const townVal = town.value;
                    const phoneVal = phone.value;
                    const applicant_emailVal = applicant_email.value;
                    const applicant_nameVal = applicant_name.value;
                    const location = input_location.value;
                    const cStatusVal = input_c_status.value;
                    const wStatusVal = input_w_status.value;
                    const slotStatusVal = input_slot.value;
                    const helpVal = input_help.value;
                    const payment_confirmedVal = input_payment_confirmed.value;
                    const transaction_idVal = input_transaction_id.value;
                    const timeVal = input_time.value;
                    const paginator = document.getElementById("paginator");

                    const CRes = await fetch('$site_url/wp-admin/admin-ajax.php?action=get_rows_count&applicants-table='+ tableVal + '&address=' + addressVal + '&town=' + townVal + '&applicant-email=' + applicant_emailVal + '&phone=' + phoneVal + '&applicant-name=' + applicant_nameVal + '&c_status=' + cStatusVal + '&w_status=' + wStatusVal + '&slot=' + slotStatusVal + '&time=' + timeVal + '&category=' + category + '&location=' + location + '&help=' + helpVal + '&payment_confirmed=' + payment_confirmedVal + '&transaction_id=' + transaction_idVal + '&order=' + order);

                    const CObject = await CRes.json();

                    const count = CObject.count;

                    const num_pages = limit == 0 ? 0 : Math.ceil(count / limit);
                    
                    await fetch('$site_url/wp-admin/admin-ajax.php?action=table_response&applicants-table='+ tableVal + '&address=' + addressVal + '&town=' + townVal + '&applicant-email=' + applicant_emailVal + '&phone=' + phoneVal + '&applicant-name=' + applicant_nameVal + '&c_status=' + cStatusVal + '&w_status=' + wStatusVal + '&slot=' + slotStatusVal + '&time=' + timeVal + '&category=' + category + '&location=' + location + '&help=' + helpVal + '&payment_confirmed=' + payment_confirmedVal + '&transaction_id=' + transaction_idVal + '&order=' + order + '&offset=' + offset + '&limit=' + limit)
                        .then(response => response.json())
                        .then(entries => {
                            table_body.innerHTML = "";
                            entries.forEach(entry => {
                                const slot = entry.slot != null ? entry.slot : "";
                                const c_status = convertBool(entry.confirmation_status);
                                const chs_location = convertBool(entry.chs_alumni_location);
                                const help = convertBool(entry.setup_help);
                                const payment_confirmed = convertBool(entry.payment_confirmed);

                                const w_status = entry.win_status != null ? entry.win_status : "";
                                const time = entry.arrival_time != null ? entry.arrival_time : "";
                                const transaction_id = entry.paypal_transaction_id != null ? entry.paypal_transaction_id : "";
                                const table_row = document.createElement('tr');
                                table_row.id = entry.applicant_id + ' ' + entry.id;
                                table_row.innerHTML = `
                                    <td>
                                        <div class="entry_select_box border border-dark rounded border-5 d-flex justify-content-center" onclick="selectRow(this)" style="width: 43px; height: 43px;">
                                            <svg width="31" height="27" viewBox="0 0 31 27" fill="none" xmlns="http://www.w3.org/2000/svg" class="d-none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.86364 21.14L2.46591 12.7638L0 15.5558L9.86364 26.7241L31 2.79207L28.5341 0L9.86364 21.14Z" fill="#212529"/>
                                            </svg>                          
                                        </div>
                                    </td>
                                    <td> <input onchange="editEntry('day', 'slot', this)" class="border-0 w-100" type='text' value='` + slot + `' /> </td>
                                    <td> <input onchange="editEntry('app', 'name', this)" class="border-0" type='text' value='` + entry.name + `' /> </td>
                                    <td> <input onchange="editEntry('app', 'address', this)" class="border-0" type='text' value='` + entry.address + `' /> </td>
                                    <td> 
                                        <select onchange="editEntry('app', 'town', this)" class="form-select w-auto">
                                            <option value="` + entry.town + `" selected disabled hidden>` + entry.town + `</option>   
                                            <option value="Maplewood">Maplewood</option>
                                            <option value="South Orange">South Orange</option>
                                        </select>
                                    </td>
                                    <td> <input onchange="editEntry('app', 'email', this)" class="border-0" type='text' value='` + entry.email + `' /> </td>
                                    <td> <input onchange="editEntry('app', 'phone', this)" class="border-0" type='text' value='` + entry.phone + `' /> </td>
                                    <td> 
                                        <select onchange="editEntry('day', 'win_status', this)" class="form-select w-auto">
                                            <option value="` + w_status + `" selected disabled hidden>` + w_status + `</option>   
                                            <option value="Win">Win</option>
                                            <option value="Waitlisted">Waitlisted</option>
                                            <option value="Declined">Declined</option>
                                            <option value="Lose">Lose</option>
                                        </select>
                                    </td>
                                    <td> 
                                        <select onchange="editEntry('day', 'arrival_time', this)" class="form-select w-auto">
                                            <option value="` + time + `" selected disabled hidden>` + time + `</option>
                                            <option value="9:00 AM">9:00 AM</option>
                                            <option value="9:15 AM">9:15 AM</option>
                                            <option value="9:30 AM">9:30 AM</option>
                                            <option value="9:45 AM">9:45 AM</option>
                                            <option value="10:00 AM">10:00 AM</option>
                                            <option value="10:15 AM">10:15 AM</option>
                                        </select>
                                    </td>
                                    <td> 
                                        <select onchange="editEntry('app', 'chs_alumni_location', this)" class="form-select w-auto">
                                            <option value="` + entry.chs_alumni_location + `" selected disabled hidden>` + chs_location + `</option>   
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </td>
                                    <td> 
                                        <select onchange="editEntry('app', 'setup_help', this)" class="form-select w-auto">
                                            <option value="` + entry.setup_help + `" selected disabled hidden>` + help + `</option>   
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </td>
                                    <td> 
                                        <select onchange="editEntry('app', 'payment_confirmed', this)" class="form-select w-auto">
                                            <option value="` + entry.payment_confirmed + `" selected disabled hidden>` + payment_confirmed + `</option>   
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </td>
                                    <td> <input onchange="editEntry('app', 'paypal_transaction_id', this)" class="border-0" type='text' value='` + transaction_id + `' /> </td>
                                    <td> 
                                        <select onchange="editEntry('day', 'confirmation_status', this)" class="form-select w-auto">
                                            <option value="` + entry.confirmation_status + `" selected disabled hidden>` + c_status + `</option>   
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </td>
                                `;
                                table_body.appendChild(table_row);
                            })
                        });
                    if (!switchPage) {
                        paginator.innerHTML = "";
                        for (var i = 0; i < num_pages; i++) {
                            const page = document.createElement('li');
                            page.classList.add("page-item");

                            if (i === 0) {
                                page.classList.add("active");
                            }
                            
                            page.innerHTML = `<button class="page-link" onclick="fillTable('` + category + `', ` + asc + `, ` + limit + `, ` + i * limit + `, true);document.getElementById('paginator').querySelector('.active').classList.remove('active');this.parentNode.classList.add('active');
                            ">` + (i + 1) + `</button>`;
                            paginator.appendChild(page);
                        }
                    }
                    selectedRows = [];
                    selectedAppRows = [];
                    document.getElementById("table-buttons").classList.remove("d-none");
                }

                function sortTable(e) {
                    if (e.target.tagName !== 'path') {
                        return;
                    }

                    const down_arrow = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    const up_arrow = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    const col = e.target.parentNode.parentNode;
                    const num_entries = entries_limit.value;

                    down_arrow.setAttribute('width', '16');
                    down_arrow.setAttribute('height', '10');
                    down_arrow.setAttribute('viewBox', '0 0 16 10');
                    down_arrow.setAttribute('fill', 'none');
                    down_arrow.innerHTML = "<path d='M0.145 1.25355L0.235 1.36013L7.035 9.30267C7.265 9.57165 7.61 9.73913 7.995 9.73913C8.38 9.73913 8.725 9.56658 8.955 9.30267L15.75 1.37535L15.865 1.2434C15.95 1.11652 16 0.96427 16 0.801867C16 0.360333 15.63 0 15.17 0H0.83C0.37 0 0 0.360333 0 0.801867C0 0.969346 0.0550001 1.12667 0.145 1.25355Z' fill='black'/>";
                    down_arrow.classList.add("down_arrow");
                    
                    up_arrow.setAttribute('width', '16');
                    up_arrow.setAttribute('height', '10');
                    up_arrow.setAttribute('viewBox', '0 0 16 10');
                    up_arrow.setAttribute('fill', 'none');
                    up_arrow.innerHTML = "<path d='M0.145 8.48558L0.235 8.37901L7.035 0.436466C7.265 0.167485 7.61 6.1315e-06 7.995 6.1315e-06C8.38 6.1315e-06 8.725 0.17256 8.955 0.436466L15.75 8.36378L15.865 8.49573C15.95 8.62261 16 8.77487 16 8.93727C16 9.3788 15.63 9.73914 15.17 9.73914H0.83C0.37 9.73914 0 9.3788 0 8.93727C0 8.76979 0.0550001 8.61246 0.145 8.48558Z' fill='black'/>";
                    up_arrow.classList.add("up_arrow");

                    const arrow = col.querySelector('svg');

                    const tabName = ['slot', 'confirmation_status', 'win_status', 'arrival_time'].includes(col.id) ? 'canopy_' + table.value : 'canopy_applicants';
                    const orderCol = prefix + tabName + "." + col.id;

                    if (selectedCol !== col) {
                        arrow.remove();
                        selectedCol.querySelector('svg').remove();
                        col.appendChild(up_arrow);
                        selectedCol.appendChild(down_arrow);
                        selectedCol = col;
                        fillTable(orderCol, false, num_entries);
                    }
                    else if (arrow.classList.contains("down_arrow")) {
                        arrow.remove();
                        col.appendChild(up_arrow);
                        fillTable(orderCol, false, num_entries);
                    }
                    else {
                        arrow.remove();
                        col.appendChild(down_arrow);
                        fillTable(orderCol, true, num_entries);
                    }
                }

                function download() {
                    const tableVal = table.value;
                    const addressVal = address.value;
                    const townVal = town.value;
                    const phoneVal = phone.value;
                    const applicant_emailVal = applicant_email.value;
                    const applicant_nameVal = applicant_name.value;
                    const location = input_location.value;
                    const cStatusVal = input_c_status.value;
                    const wStatusVal = input_w_status.value;
                    const slotStatusVal = input_slot.value;
                    const help = input_help.value;
                    const payment_confirmed = input_payment_confirmed.value;
                    const timeVal = input_time.value;

                    window.location.href = '$site_url/wp-admin/admin-ajax.php?action=spreadsheet&applicants-table='+ tableVal + '&address=' + addressVal + '&town=' + townVal + '&applicant-email=' + applicant_emailVal + '&phone=' + phoneVal + '&applicant-name=' + applicant_nameVal + '&c_status=' + cStatusVal + '&w_status=' + wStatusVal + '&slot=' + slotStatusVal + '&location=' + location + '&time=' + timeVal + '&category=' + category + '&help=' + help + '&payment_confirmed=' + payment_confirmed + '&order=' + order;
                }

                function selectMessage(index, e) {
                    const emailMessages = [
                    `<span style="white-space: pre-line">Dear {name},

                    Congratulations! You won the Maplewoodstock Canopy Lottery for a canopy location on {day}! If you entered the lottery for multiple days, you will receive a separate notification for each day of the festival. 
                    <b>Please read this entire email as action is required to confirm your attendance at the event.</b>
                    
                    You are {slot} in the lottery for that day and must arrive at {arrival_time} to set up your canopy.
                    
                    The address we have on record for your entry is: {address} in {town}.
                    
                    <b>PLEASE COMPLETE THIS CONFIRMATION FORM NO LATER THAN JULY 9, 2025 TO CONFIRM YOUR ACCEPTANCE OF THE CANOPY LOCATION AND THE LOTTERY RULES:</b>
        
                    {link_to_confirmation_form}
                    
                    <b>Failure to respond will forfeit your canopy location.</b>

                    <b>EXCITING SETUP OPTION! After last year's resounding success, Maplewoodstock is again offering a "canopy setup service"! For a $100 tax-deductible donation, you can drop off your canopy on the FRIDAY before the festival and arrive to your location on Saturday or Sunday at your leisure with your canopy already set up! 
                    Details included on the confirmation page link above. Please help support Maplewoodstock!</b>
                    
                    For any questions, please view the Canopy Lottery Rules at https://maplewoodstock.com/canopy/canopy-rules/ and Frequently Asked Questions at https://maplewoodstock.com/canopy/canopy-faq/, but here are a few things to keep in mind:
                
        
                    • You have been assigned a specific time to arrive at Memorial Park in the morning for which you have won.  

                    • At that time on the morning of the festival, you will need to bring with you: (1) your canopy (ready for assembly and not new in the box), (2) proof of address matching the address in the lottery application, and (3) at least one legal adult (18 or older).  It is our experience that at least 2 adults should be present to set up the canopy but only one is officially required.  Teens may assist so long as one adult is present.  
    
                    • If any of these requirements are missing, you may end up at the end of the line or without a space at all.
    
                    • When arriving to set up your canopy, please plan to park on Dunnell Road between Oakview Avenue and Oakland Road as other local parking is reserved for vendors and emergency personnel.  Please leave extra time to access the park area as there may be road closures (and ongoing construction at the Maplewood library is unpredictabl). Lottery winners will receive additional details in advance of the festival.  This is subject to change as we finalize the logistical details of our festival. And, to be clear — you MUST relocate your car after unloading your canopy — as there are lots of bands, equipment, ice, food, arts and crafts, etc. being loaded into and out of our festival grounds at all hours of the days at the beautiful and historic Memorial Park.
                    
                    • Bring your canopy to the front of the stage where you will check in with Maplewoodstock Canopy Committee team members and provide confirmation of your entry address.
    
                    • After checking in, our volunteer staff will assign you a canopy location - you will not get to choose your location.  You get what you get and, while lower lottery numbers will generally get better spots, we do not guarantee any specific location.  As in past years, not every canopy location has a direct view of the stage.
    
                    • Please consider consolidating with another lottery winner as there were over 800 entrants to the lottery, many from the same streets.
    
                    • Your canopy location will be assigned.  If you want to be assured you will be near someone else with a canopy, we recommend sitting together under one canopy.
                    
                    • It's the neighborly thing to do and Maplewoodstock is all about community.  If you wish to consolidate canopies with another winner, please let us know and we’ll gladly assign your canopy slot to another entrant.

        
                    IN THE EVENT YOUR PLANS CHANGE AND YOU WON’T BE ABLE TO USE YOUR CANOPY SPOT, PLEASE EMAIL US AT MAPLEWOODSTOCKCANOPIES@GMAIL.COM 
        
                    OR CALL (973) 996-8198 AS SOON AS POSSIBLE.
            
                    We look forward to seeing you at Maplewoodstock!</span>`, 
                    `<span style="white-space: pre-line">Dear Maplewoodstock Canopy Lottery Entrant,
                        
                        
                    Thank you for entering the Maplewoodstock Canopy Lottery.  You did not win the lottery for a canopy location on {day}, however you have been placed on the wait list for this date.  If you entered the lottery for multiple days, you will receive a separate notification for each day of the festival.
                    
                    
                    You are {slot} in the lottery for that day and must arrive at {arrival_time} per the instructions below. 
                    
                    
                    The address we have on record for your entry is: {address} in {town}. 
                    The phone number we have on file for your submission is: {phone}
                    
                    
                    PLEASE COMPLETE THE WAITLIST CONFIRMATION FORM NO LATER THAN JULY 10, 2024 TO CONFIRM YOUR ACCEPTANCE OF THE WAITLIST OPPORTUNITY AND THE LOTTERY RULES:
                    
                    
                    {link_to_confirmation_form}
                    
                    
                    Failure to respond by July 10th will forfeit your waitlist opportunity.
                    
                    
                    What does this mean for you?  Fifteen lottery applicants who did not win the lottery have been placed on the wait list in the event a lottery winner does not set up their canopy on the morning of the festival per the instructions provided to them.  While wait list holders will be the first people to have the opportunity to set up canopies in the event of a no-show, there is no guarantee a canopy location will be awarded to you.
                    
                    
                    • You should plan to arrive at Memorial Park at {arrival_time} on the morning for which you are on the wait list.  Please plan to park on Dunnell Road between Oakview Avenue and Oakland Road as other local parking is reserved for vendors and emergency personnel.  Please leave extra time to access the park area as there may be road closures (and ongoing construction at the Maplewood library is unpredictable). Please plan to relocate your car after unloading your canopy as there are lots of bands, equipment, ice, food, arts and crafts, etc. being loaded into and out of our festival grounds.
                
                
                    • At that time on the morning of the festival, you will need to bring with you: (1) your canopy, (2) proof of address matching the address in the lottery application, and (3) at least one legal adult (18 or older).  It is our experience that at least 2 adults should be present to set up the canopy but only one is officially required.  Teens may assist so long as one adult is present.  
                
                
                    • If any of these requirements are missing, you may end up at the end of the line or without a space at all.
                
                
                    • Note: As a wait list member you are not required to bring your canopy from your car to the concert field at the assigned time (though you are welcome to do so); if you are notified that you’ve won a canopy location you can go back to your car and get your canopy at that time.
                
                
                    • If you are awarded a canopy location (which is not guaranteed), our volunteer staff will assign you a canopy location - you will not get to choose your location.  You get what you get and as a wait list member, you are likely to have a canopy location in the back and/or without a direct view of the stage.
                
                    <b>While you didn't win this year's lottery, there is still a chance to win an incredible shaded Maplewoodstock experience! Please consider participating in our first "MAPLEWOODSTOCK ULTIMATE EXPERIENCE" fundraiser to support our festival, which is auctioning off three exclusive canopy experiences each day of the festival. Auction winners will receive a fully furnished and decorated canopy, a cooler with ice cold drinks, snacks, dinner from Village Trattoria, a Maplewoodstock t-shirt, reserved parking, and more! Donations are tax-deductible! Each canopy can fit 2-3 families so consider bidding together to increase your chances! The top 3 bidders each day will win! Visit https://givebutter.com/c/maplewoodstock2024/auction to learn more and place your bids!</b>
                    
                    THANK YOU FOR SUBMITTING YOUR WAIT LIST CONFIRMATION, WE LOOK FORWARD TO AN AWESOME MAPLEWOODSTOCK!
                    
                    IN THE EVENT YOUR PLANS CHANGE AND YOU WON’T BE ABLE TO USE YOUR CANOPY SPOT, PLEASE EMAIL US AT MAPLEWOODSTOCKCANOPIES@GMAIL.COM OR CALL (973) 996-8198 AS SOON AS POSSIBLE.</span>`, 
                    `<span style="white-space: pre-line">Everyone, 
                    Thank you so much for participating in the Maplewoodstock Canopy Lottery. Unfortunately, you did not win a canopy location for Sunday, 7/9/23.  You will receive a separate notice for the other day if you entered the lottery for both days of the festival. 
                    
                    Over 800 Maplewood and South Orange residences submitted entries - a new record - and we did our best to accommodate as many families as possible. To this end, we maximized the number of canopy locations possible at the festival site and also ensured no entrant won twice while others did not win at all. We strongly encourage everyone to speak to their neighbors - it's likely you know someone who won, and sharing canopy space is the Maplewoodstock way! 
                    
                    A final reminder to check out the lottery rules and FAQs at maplewoodstock.com/canopy. The answers to most questions (including the fact that lottery wins can't be transferred/traded/sold) can be found there. 
                    
                    <b>While you didn't win this year's lottery, there is still a chance to win an incredible shaded Maplewoodstock experience! Please consider participating in our first "MAPLEWOODSTOCK ULTIMATE EXPERIENCE" fundraiser to support our festival, which is auctioning off three exclusive canopy experiences each day of the festival. Auction winners will receive a fully furnished and decorated canopy, a cooler with ice cold drinks, snacks, dinner from Village Trattoria, a Maplewoodstock t-shirt, reserved parking, and more! Donations are tax-deductible! Each canopy can fit 2-3 families so consider bidding together to increase your chances! The top 3 bidders each day will win! Visit https://givebutter.com/c/maplewoodstock2024/auction to learn more and place your bids!</b>
                    
                    Thank you so much for your support and understanding! The Maplewoodstock Canopy Committee</span>`,
                    `<span style="white-space: pre-line">MAPLEWOODSTOCK CANOPY UPDATE - You’re off the waitlist and have a confirmed spot for {day}! Reply YES asap to confirm and we’ll email you details. Thanks!!!</span>`,
                    `<span style="white-space: pre-line">Dear {name},

                    Per our lottery rules there can only be one entry for each Maplewood or South Orange address.  
                    
                    We received multiple entries for your address and your entry has been deleted (but one entry from your address remains).
                    
                    Thanks and good luck!
                    The Maplewoodstock Canopy Team</span>`,
                    ``];

                    const subjects = ["MAPLEWOODSTOCK CANOPY LOTTERY RESULTS - YOU WON - ACTION REQUIRED", "MAPLEWOODSTOCK CANOPY LOTTERY RESULTS - WAITLIST - ACTION REQUIRED", "MAPLEWOODSTOCK CANOPY LOTTERY RESULTS", "MAPLEWOODSTOCK CANOPY LOTTERY STATUS UPDATE - CANOPY OPPORTUNITY", "Duplicate Entry - Maplewoodstock Lottery", ""];

                    const ul = e.parentNode;
                    const formGroup = ul.parentNode.parentNode.querySelector(".form-group");
                    const cSelectedItem = ul.querySelector(".active");
                    const eTextArea = document.createElement("textarea");
                    const input = document.createElement("input");
                    const sLabel = document.createElement("label");
                    const emLabel = document.createElement("label");
                    const p = document.createElement("p");

                    sLabel.htmlFor = "subject";
                    sLabel.innerHTML = "Subject:";
                    emLabel.htmlFor = "eMessage";
                    emLabel.innerHTML = "Email Message:";
                    input.type = "text";
                    input.id = "subject";
                    input.placeholder = "Enter subject";
                    input.value = subjects[index];
                    input.classList.add("form-control");
                    input.classList.add("border-dark");
                    eTextArea.classList.add("border-dark", "form-control");
                    eTextArea.rows = "25";
                    eTextArea.id = "eMessage";
                    eTextArea.value = emailMessages[index];
                    p.innerText = `Formatting:
                    {name} = name, {address} = address, {town} = town, {email} = email, {phone} = phone, {confirmation_status} = confirmation status for currently selected day, {slot} = slot for currently selected day, {win_status} = win_status for currently selected day, {arrival_time} = arrival time for currently selected day, {day} = day of the selected table, {link_to_confirmation_form} = the link to the confirmation form of the selected day for each user`;
                    p.classList.add("form-text");

                    if (cSelectedItem) {
                        cSelectedItem.classList.remove("active");
                    }
                    e.classList.add("active");

                    formGroup.innerHTML = "";

                    formGroup.appendChild(sLabel);
                    formGroup.appendChild(input);
                    formGroup.appendChild(emLabel);
                    formGroup.appendChild(eTextArea);
                    formGroup.appendChild(p);
                }

                const sModal = new bootstrap.Modal(document.getElementById('applied'), {
                    keyboard: false
                });                  

                const fModal = new bootstrap.Modal(document.getElementById('failed'), {
                    keyboard: false
                });    
                
                const dModal = new bootstrap.Modal(document.getElementById('download'), {
                    keyboard: false
                }); 

                const dcModal = new bootstrap.Modal(document.getElementById('delete-confirm'), {
                    keyboard: false
                }); 

                const delModal = new bootstrap.Modal(document.getElementById('entries-deleted'), {
                    keyboard: false
                }); 

                document.getElementById("submit-filter").addEventListener("click", () => fillTable(prefix + 'canopy_' + table.value + '.slot', true, entries_limit.value)); 
                const cols = document.querySelectorAll('th:not(#select_all)');
                cols.forEach(col => {
                    col.addEventListener('click', e => sortTable(e));
                })
                document.getElementById("apply-changes").addEventListener("click", () => {
                    fetch('$site_url/wp-admin/admin-ajax.php?action=apply_changes', {
                        method: "POST",
                        body: JSON.stringify({
                            changes: changes
                        }),
                        headers: {
                            "Content-Type": "application/json",
                        }
                    })
                        .then(res => {
                            if (!res.ok) {
                                return res.text().then(text => { throw new Error(text) })
                            }
                            sModal.show();
                        })
                        .catch(error => {
                            const error_json = JSON.parse(error.message);
                            document.getElementById("error-message").innerHTML = 'Error: <br/>' + error_json.data;
                            fModal.show();
                        })
                    changes = [];
                });
                document.getElementById("apply-changes-top").addEventListener("click", () => {
                    fetch('$site_url/wp-admin/admin-ajax.php?action=apply_changes', {
                        method: "POST",
                        body: JSON.stringify({
                            changes: changes
                        }),
                        headers: {
                            "Content-Type": "application/json",
                        }
                    })
                        .then(res => {
                            if (!res.ok) {
                                return res.text().then(text => { throw new Error(text) })
                            }
                            sModal.show();
                        })
                        .catch(error => {
                            const error_json = JSON.parse(error.message);
                            document.getElementById("error-message").innerHTML = 'Error: <br/>' + error_json.data;
                            fModal.show();
                        })
                    changes = [];
                });
                document.getElementById('delete-selected').addEventListener("click", () => dcModal.show());
                document.getElementById('close-smodal').addEventListener("click", () => sModal.hide());
                document.getElementById('close-fmodal').addEventListener("click", () => fModal.hide());
                document.getElementById('export').addEventListener('click', () => dModal.show());
                document.getElementById('close-dmodal').addEventListener('click', () => dModal.hide());
                document.getElementById('download-xl').addEventListener('click', download);
                document.getElementById('cancel').addEventListener('click', () => dcModal.hide());
                document.getElementById('close-delModal').addEventListener('click', () => delModal.hide());
            </script>
            <div class="modal" id="contact-popup" role="dialog">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" id="close-cmodal"></button>
                        </div>
                        <div class="modal-body d-flex flex-column gap-5" id="contact-body">
                            <div class="d-flex gap-5">
                                <div>
                                    <label>Messages:</label>
                                    <ul class="list-group">
                                        <li class="list-group-item" onclick="selectMessage(0, this)">You Won Message</li>
                                        <li class="list-group-item" onclick="selectMessage(1, this)">Wating List Message</li>
                                        <li class="list-group-item" onclick="selectMessage(2, this)">You Lost Message</li>
                                        <li class="list-group-item" onclick="selectMessage(3, this)">Confirm Unrecieved Message</li>
                                        <li class="list-group-item" onclick="selectMessage(4, this)">Duplicate Entry</li>
                                        <li class="list-group-item" onclick="selectMessage(5, this)">Custom Message</li>
                                    </ul>
                                </div>
                                <div class="form-group" style="width:100%;"></div> 
                            </div>
                            <button class="btn btn-primary text-light align-self-center rounded d-flex justify-content-center align-items-center" id="send" style="width: 375px; height: 82px;">
                                <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M31.295 53.0003C30.9242 53.0001 30.561 52.8956 30.2467 52.6988C29.9324 52.5021 29.6798 52.2209 29.5176 51.8874L20.2215 32.7771L1.11126 23.4824C0.766998 23.3146 0.478863 23.0505 0.281833 22.7221C0.0848024 22.3937 -0.0126475 22.0151 0.00131535 21.6324C0.0152782 21.2497 0.140053 20.8792 0.36049 20.5661C0.580927 20.2529 0.887544 20.0104 1.24311 19.8682L50.2827 0.143411C50.6425 -0.00162773 51.0371 -0.0376356 51.4172 0.0398703C51.7974 0.117376 52.1464 0.304973 52.4207 0.579309C52.695 0.853645 52.8826 1.20261 52.9601 1.58276C53.0376 1.9629 53.0016 2.35745 52.8566 2.71729L33.1305 51.7608C32.9875 52.1161 32.7444 52.4223 32.4308 52.6421C32.1171 52.8618 31.7464 52.9858 31.3636 52.999L31.295 53.0003ZM6.85107 21.8816L22.566 29.5295C22.9643 29.7231 23.2861 30.0449 23.4798 30.4432L31.1276 46.1582L47.4504 5.53907L6.85107 21.8816Z" fill="white"/>
                                    <path d="M21.7011 33.2756C21.3099 33.2755 20.9275 33.1594 20.6023 32.942C20.277 32.7246 20.0236 32.4156 19.874 32.0541C19.7244 31.6926 19.6853 31.2949 19.7618 30.9113C19.8382 30.5276 20.0267 30.1752 20.3034 29.8987L49.6222 0.579882C49.8059 0.396246 50.024 0.250596 50.264 0.151246C50.504 0.0518962 50.7613 0.000793329 51.021 0.000854547C51.2808 0.000915765 51.538 0.0521402 51.778 0.151603C52.0179 0.251066 52.2359 0.396819 52.4196 0.580541C52.6032 0.764264 52.7489 0.982356 52.8482 1.22237C52.9476 1.46238 52.9987 1.71961 52.9986 1.97937C52.9985 2.23913 52.9473 2.49634 52.8479 2.7363C52.7484 2.97627 52.6026 3.19429 52.4189 3.37793L23.1001 32.702C22.7281 33.0709 22.225 33.2772 21.7011 33.2756Z" fill="white"/>
                                </svg>           
                                <h1>Send</h1>
                            </button>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <script>
            function delete_entries() {
                fetch('$site_url/wp-admin/admin-ajax.php?action=delete_entries', {
                    method: 'POST',
                    body: JSON.stringify({
                        ids: selectedAppRows,
                        day: table.value
                    }),
                    headers: {
                        "Content-Type": "application/json",
                    }
                })
                    .then(() => {
                        selectedRows.forEach(row => {
                            document.getElementById(row).remove();
                        });
                        selectedAppRows = [];
                        selectedRows = [];
                        dcModal.hide();
                        delModal.show();
                    });
                }
            
                function sendMessage() {
                    const body = document.getElementById('contact-body');
                    const emailMessage = document.getElementById('eMessage').value;
                    const subject = document.getElementById('subject').value;
                    fetch('$site_url/wp-admin/admin-ajax.php?action=send_message', {
                        method: 'POST',
                        body: JSON.stringify({
                            emailMessage: emailMessage,
                            subject: subject,
                            ids: selectedAppRows,
                            day: table.value
                        }),
                        headers: {
                            "Content-Type": "application/json",
                        }
                    })
                        .then(res => {
                            if (!res.ok) {
                                throw new Error("");
                            }

                            const sDiv = document.createElement("div");
                            sDiv.innerHTML = `
                                <svg width="30" height="30" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23 0C10.317 0 0 10.317 0 23C0 35.683 10.317 46 23 46C35.683 46 46 35.683 46 23C46 18.44 44.6603 14.1893 42.3633 10.6113L40.9941 12.2285C42.8891 15.3825 44 19.06 44 23C44 34.579 34.579 44 23 44C11.421 44 2 34.579 2 23C2 11.421 11.421 2 23 2C28.443 2 33.3939 4.09977 37.1289 7.50977L38.4375 5.96484C34.3525 2.25984 28.935 0 23 0ZM41.2363 5.75391L21.9141 28.5547L13.7812 20.9688L12.418 22.4316L22.084 31.4473L42.7637 7.04688L41.2363 5.75391Z" fill="white"/>
                                </svg>
                                
                                Message Sent Successfully.
                            `;
                            sDiv.classList.add("alert");
                            sDiv.classList.add("h4");
                            sDiv.classList.add("bg-success");
                            sDiv.classList.add("text-light");
                            body.appendChild(sDiv);
                            setTimeout(() => body.removeChild(sDiv), 10000);
                        })
                        .catch(() => {
                            const errorDiv = document.createElement("div");
                            errorDiv.innerHTML = "There was an error in sending the message/s";
                            errorDiv.classList.add("alert");
                            errorDiv.classList.add("h4");
                            errorDiv.classList.add("bg-danger");
                            errorDiv.classList.add("text-light");
                            body.appendChild(errorDiv);
                            setTimeout(() => body.removeChild(errorDiv), 10000);
                        });
                }
            
                const cModal = new bootstrap.Modal(document.getElementById('contact-popup'), {
                    keyboard: false
                });
                document.getElementById('contact-selected').addEventListener('click', () => cModal.show());
                document.getElementById('close-cmodal').addEventListener('click', () => cModal.hide());
                document.getElementById('send').addEventListener('click', sendMessage);
                document.getElementById('delete').addEventListener("click", delete_entries);
            </script>
        EOD;
    }

    $day_table;
    $app_table = $wpdb->prefix."canopy_applicants";

    function data_query($name, $address, $town, $email, $phone, $order, $category, $applicants_table, $slot, $c_status, $w_status, $time, $location, $help, $payment_confirmed, $transaction_id)
    {
        global $wpdb, $day_table, $app_table;

        $day_table = $wpdb->prefix."canopy_".$applicants_table;
        
        $name_query = $name != "" ? " ".$app_table.".name='$name' AND" : "";
        $address_query = $address != "" ? " ".$app_table.".address='$address' AND" : "";
        $town_query = $town != "" ? " ".$app_table.".town='$town' AND" : "";
        $email_query = $email != "" ? " ".$app_table.".email='$email' AND" : "";
        $phone_query = $phone != "" ? " ".$app_table.".phone='$phone' AND" : "";
        $location_query = $location != "" ? " ".$app_table.".chs_alumni_location='$location' AND" : "";
        $help_query = $help != "" ? " ".$app_table.".setup_help='$help' AND" : "";
        $payment_confirmed_query = $payment_confirmed != "" ? " ".$app_table.".payment_confirmed='$payment_confirmed' AND" : "";
        $transaction_id_query = $transaction_id != "" ? " ".$app_table.".paypal_transaction_id='$transaction_id' AND" : "";
        $slot_query = $slot != "" ? " ".$day_table.".slot=$slot AND" : "";
        $c_status_query = $c_status != "" ? " ".$day_table.".confirmation_status=$c_status AND" : "";
        $w_status_query = $w_status != "" ? " ".$day_table.".win_status='$w_status' AND" : "";
        $time_query = $time != "" ? " ".$day_table.".arrival_time='$time'" : " 1=1";

        $data_query = " FROM ".$day_table." INNER JOIN ".$app_table." ON ".$day_table.".applicant_id=".$app_table.".id"." WHERE".$name_query.$address_query.$town_query.$email_query.$phone_query.$location_query.$help_query.$payment_confirmed_query.$transaction_id_query.$slot_query.$c_status_query.$w_status_query.$time_query." ORDER BY ".$category." ".$order;

        return $data_query;
    }

    function get_rows_count()
    {
        global $wpdb;
        
        $data_query = data_query($_GET['applicant-name'], $_GET['address'], $_GET['town'], $_GET['applicant-email'], $_GET['phone'], $_GET['order'], $_GET['category'], $_GET['applicants-table'], $_GET['slot'], $_GET['c_status'], $_GET['w_status'], $_GET['time'], $_GET['location'], $_GET['help'], $_GET['payment_confirmed'], $_GET['transaction_id']);

        $count = $wpdb->get_results("SELECT COUNT(*)".$data_query);

        wp_send_json(array("count" => $count[0]->{"COUNT(*)"}));
    }

    function get_rows($data_query, $have_ids = false, $limit = 0, $offset = 0)
    {
        global $wpdb, $day_table, $app_table;

        $limit_query = $limit != 0 ? " LIMIT ".$limit : ""; 

        $offset_query = $offset != 0 ? " OFFSET ".$offset : "";

        $id_select = $have_ids ? ", ".$day_table.".applicant_id, ".$day_table.".id" : "";

        $entries = $wpdb->get_results("SELECT ".$day_table.".slot, ".$app_table.".name, ".$app_table.".address, ".$app_table.".email, ".$app_table.".town, ".$app_table.".phone, ".$app_table.".chs_alumni_location, ".$app_table.".setup_help, ".$app_table.".payment_confirmed, ".$app_table.".paypal_transaction_id, ".$day_table.".confirmation_status, ".$day_table.".arrival_time, ".$day_table.".win_status".$id_select.$data_query.$limit_query.$offset_query);

        return $entries;
    }

    function table_response()
    {
        $data_query = data_query($_GET['applicant-name'], $_GET['address'], $_GET['town'], $_GET['applicant-email'], $_GET['phone'], $_GET['order'], $_GET['category'], $_GET['applicants-table'], $_GET['slot'], $_GET['c_status'], $_GET['w_status'], $_GET['time'], $_GET['location'], $_GET['help'], $_GET['payment_confirmed'], $_GET['transaction_id']);
        
        $entries = get_rows($data_query, true, $_GET['limit'], $_GET['offset']);
        
        wp_send_json($entries);
    }

    function apply_changes() 
    {
        global $wpdb;

        $json_str = file_get_contents('php://input');
        $json_obj = json_decode($json_str);
        $updates = $json_obj->changes;

        foreach($updates as $update)
        {
            $id = $update->id;
            $table = $update->table;
            $col = $update->col;
            $value = in_array($col, ['name', 'address', 'town', 'email', 'phone', 'win_status', 'arrival_time', 'paypal_transaction_id']) ? "'".$update->value."'" : $update->value;
            $wpdb->get_results("UPDATE ".$wpdb->prefix."canopy_".$table." SET ".$col." = ".$value." WHERE id = ".$id);
            if  ($wpdb->last_error)
            {
                wp_send_json_error($wpdb->last_error, 400, null);
            }
        }
    }

    function convert_bool($value)
    {
        $string;

        if ($value == 1)
        {
            $string = "Yes";
        }
        else if (!is_null($value) && $value == 0)
        {
            $string = "No";
        }
        else 
        {
            $string = $value;
        }

        return $string;
    }

    function spreadsheet()
    {
        if ( !defined('CBXPHPSPREADSHEET_PLUGIN_NAME') || !file_exists( CBXPHPSPREADSHEET_ROOT_PATH . 'lib/vendor/autoload.php' ) ) 
        {
           return; 
        }

        require_once( CBXPHPSPREADSHEET_ROOT_PATH . 'lib/vendor/autoload.php' );
        
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        
        $sheet = $spreadsheet->getActiveSheet();

        $data_query = data_query($_GET['applicant-name'], $_GET['address'], $_GET['town'], $_GET['applicant-email'], $_GET['phone'], $_GET['order'], $_GET['category'], $_GET['applicants-table'], $_GET['slot'], $_GET['c_status'], $_GET['w_status'], $_GET['time'], $_GET['location'], $_GET['help'], $_GET['payment_confirmed'], $_GET['transaction_id']);
        $rows = get_rows($data_query);

        $sheet->setCellValue('A1', 'Slot');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Address');
        $sheet->setCellValue('D1', 'Town');
        $sheet->setCellValue('E1', 'Email');
        $sheet->setCellValue('F1', 'Phone');
        $sheet->setCellValue('G1', 'Win Status');
        $sheet->setCellValue('H1', 'Arrival Time');
        $sheet->setCellValue('I1', 'CHS Alumni Location');
        $sheet->setCellValue('J1', 'Canopy Help');
        $sheet->setCellValue('K1', 'PayPal Payment Confirmed');
        $sheet->setCellValue('L1', 'Confirmation Status');

        $entries = array();

        foreach($rows as $row)
        {
            $arr = array();
            $chs_location = convert_bool($row->chs_alumni_location);
            $help = convert_bool($row->setup_help);
            $payment_confirmed = convert_bool($row->payment_confirmed);
            $c_status = convert_bool($row->confirmation_status);

            array_push($arr, $row->slot, $row->name, $row->address, $row->town, $row->email, $row->phone, $row->win_status, $row->arrival_time, $chs_location, $help, $payment_confirmed, $c_status);
            array_push($entries, $arr);
        }
        
        $sheet->fromArray($entries, null, 'A2');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

        $date = date("Y-m-d-h:i:sa");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$date.'.xlsx"');

        $writer->save('php://output');
        die;
    }

    function send_message()
    {
        global $wpdb;

        $site_url = get_site_url();

        $json_str = file_get_contents('php://input');
        $json_obj = json_decode($json_str);
        $ids = $json_obj->ids;
        $eMessage = $json_obj->emailMessage;
        $subject = $json_obj->subject;
        $tDay = $json_obj->day;

        foreach($ids as $id)
        {
            $applicant = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."canopy_applicants WHERE id=".$id)[0];
            $entry = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."canopy_".$tDay." WHERE applicant_id=".$id)[0];
            $sEMessage = $eMessage;
            $day = $tDay == "saturday" ? "Saturday, 7/12/25" : "Sunday, 7/13/25";

            $en_e_id = openssl_encrypt($entry->id, CIPHER, KEY);
            $en_a_id = openssl_encrypt($id, CIPHER, KEY);

            $sEMessage = str_replace("{name}", $applicant->name, $sEMessage);
            $sEMessage = str_replace("{address}", $applicant->address, $sEMessage);
            $sEMessage = str_replace("{town}", $applicant->town, $sEMessage);
            $sEMessage = str_replace("{email}", $applicant->email, $sEMessage);
            $sEMessage = str_replace("{phone}", $applicant->phone, $sEMessage);
            $sEMessage = str_replace("{confirmation_status}", $entry->confirmation_status, $sEMessage);
            $sEMessage = str_replace("{slot}", $entry->slot, $sEMessage);
            $sEMessage = str_replace("{win_status}", $entry->win_status, $sEMessage);
            $sEMessage = str_replace("{arrival_time}", $entry->arrival_time, $sEMessage);
            $sEMessage = str_replace("{day}", $day, $sEMessage);
            $sEMessage = str_replace("{link_to_confirmation_form}", "$site_url/confirmation-form?a_id=$en_a_id&e_id=$en_e_id&day=$tDay", $sEMessage);

            wp_mail($applicant->email, $subject, $sEMessage);
        }
    }

    function delete_entries()
    {
        global $wpdb;

        $json_str = file_get_contents('php://input');
        $json_obj = json_decode($json_str);
        $ids = $json_obj->ids;
        $day = $json_obj->day;

        foreach($ids as $id)
        {
            $wpdb->delete(
                $wpdb->prefix.'canopy_'.$day,
                array(
                    'applicant_id' => $id
                )
            );

            $sat_results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."canopy_saturday WHERE applicant_id=".$id);
            $sun_results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."canopy_sunday WHERE applicant_id=".$id);

            if (!$sat_results && !$sun_results)
            {
                $wpdb->delete(
                    $wpdb->prefix.'canopy_applicants',
                    array(
                        'id' => $id
                    )
                );
            }
        }
    }
?>