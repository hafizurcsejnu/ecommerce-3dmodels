
<style>
footer.footer.d-none.d-sm-block {
    display: none!important;
}
body {
    overflow-x: hidden;
    background-color: #fff; 
    color: #000;
    font-family: 'Times New Roman', Times, serif;
}
.resume_wrapper {
    margin: 10px 40px;
}

.header{
        text-align: center;
    }
.header ul li {
    display: inline;
    margin: 0 14px;
}
.certifications ul li{
    
}
</style>
    <div class="resume_wrapper">        
        <div class="section_area header">
            <h1>Sales Report</h1>
            <h5>From: {{$starting_month}} To: {{$ending_month}} | Total Records: {{$total}}</h5>
            <hr style="border-bottom: 2px solid #000;">
           
        </div>   
        
        <table class="table table-striped">
            <thead>
              <tr style="background-color: #ddd; width:100%">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Product Id</th>
                <th scope="col">Price</th>
                <th scope="col">Order Date</th>
              </tr>
            </thead>
            <tbody>
           
                @foreach($data as $item) 
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td style="text-align: center">{{$item->id}}</td>
                    <td>${{$item->price}}</td>
                    <td>{{$item->created_at}}</td>
                </tr>
                @endforeach                       
            </tbody>
          </table>

    </div>
