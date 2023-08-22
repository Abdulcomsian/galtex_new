
<section id="content" data-page="orders-list">
    <div class="container"> 
        
        <div class="row">
            
            <div class="col-md-12">
                <div class="tile">
                <div class="t-header">
                    

             <div class="col-md-12">
                
                <div class="filter-btn-section" style="width : 100%; display: flex; justify-content: end">
                         <div class="filter-section">        
                            
                             <select name="company" id="company" style="height: 34px; border: 1px solid grey; border-radius: 3px;">
                                 <option value="">All</option>
                                 <?php foreach($companies as $company) { ?>
                                     <option value="<?=$company->user_id?>"><?php echo $company->first_name." ".$company->last_name."(".$company->email.")"; ?></option>
                                 <?php } ?>
                             </select>
                         </div>
                         <div class="filter-btn">
                             <button class="btn btn-primary filter-company-order" style="margin: 2px 5px;">Filter</button>
                         </div>
                 </div>
             </div>



                        <div class="th-title"><span class="zmdi zmdi-view-web zmdi-hc-fw" aria-hidden="true"></span> <?php echo lang('orders'); ?> (<?php echo addZero($orders['data']['total_records']); ?>)
                            <!-- <a style="margin-right: 73%;" href="<?php echo base_url(); ?>admin/orders/export_employees_orders" class="btn btn-primary pull-right admin-right-btn"><?php echo lang('export_employees_orders'); ?></a>
                            <a href="<?php echo base_url(); ?>admin/orders/export_products_order" class="btn btn-primary pull-right admin-right-btn m-r-5"><?php echo lang('export_products_orders'); ?></a> -->
                    </div><br/>
                    <div class="current_games_section">
                        <table class="table table-striped table-bordered my-datatable" >
                            <thead>
                                <tr>
                                    <th><?php echo lang('s_no'); ?></th>
                                    <th><?php echo lang('employee_name'); ?></th>
                                    <th><?php echo lang('client_name'); ?></th>
                                    <th><?php echo lang('amount'); ?> (<?php echo CURRENCY_SYMBOL; ?>)</th>
                                    <th><?php echo lang('address_mode'); ?></th>
                                    <th><?php echo lang('order_status'); ?></th>
                                    <th><?php echo lang('payment_status'); ?></th>
                                    <th><?php echo lang('created_date'); ?></th>
                                    <th><?php echo lang('action'); ?></th>
                                </tr> 
                            </thead>
                            <tbody> 
                            <?php if(!empty($orders['data']['records'])){ $i = 1; foreach ($orders['data']['records'] as $value) { ?>
                            <tr>
                                <td><?php echo addZero($i); ?> </td>
                                <td><?php echo $value['employee_name']; ?></td>
                                <td><?php echo $value['client_name']; ?></td>
                                <td><?php echo CURRENCY_SYMBOL.$value['order_amount']; ?></td>
                                <td><?php echo getDeliveryMethod($value['address_mode']); ?></td>
                                <td><?php echo getOrderStatus($value['order_status']); ?></td>
                                <td><?php echo ($value['credit_card_amount'] > 0) ? getPaymentStatus($value['payment_status']) : 'N/A'; ?></td>
                                <td><?php echo convertDateTime($value['created_date']); ?> </td>
                                <td>
                                   <button class="btn bg-cyan btn-icon" onclick="window.location.href='details/<?php echo $value['order_guid']; ?>'" title="<?php echo lang('view_order_details'); ?>"><i class="zmdi zmdi-eye"></i></button>
                                </td>
                           </tr>
                            <?php $i++; } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</section>


<script>
    document.querySelector(".filter-company-order").addEventListener("click", function(e) {
        let company = document.getElementById("company").value;
        $.ajax({
            url: api_url + "order/filter",
            type: "POST",
            data: {
                company: company
            },
            dataType: 'json', // Parse the response as JSON
            success: function(res) {
                // console.log(res.data.orders)
                if (res.data.success === true) {
                    $('.my-datatable').DataTable().destroy();
                    document.querySelector(".my-datatable").querySelector("tbody").innerHTML = res.data.orders;
                    $('.my-datatable').DataTable()
                } 
            }
        });
});
</script>

