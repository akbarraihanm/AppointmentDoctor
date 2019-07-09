@include('layouts.headerpimpinan')

<style type="text/css">
.tengah {
    margin: 50px auto;
    margin-top: 10px auto;
    /* width: 800px; */
    /* padding: 10px; */
    border: 1px solid #ccc;
    /* background: lightblue; */
}
    .tengah2 {
        /* margin-top: 5px; */
        margin-bottom: 20px;
    }
</style>
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/progress">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Progress Dokter</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/kunjungan/1">
          <i class="fas fa-fw fa-table"></i>
          <span>Kunjungan Pasien</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">
          
              <div class="container mx-auto mt-5 col-md-6">
                      <div class="form-group">
                        <label for="dropdown">Pilih Bulan</label>
                        <select name="bulan" class="form-control" id="bulan">
                            <option value="">--Silahkan Dipilih--</option>                            
                            @foreach($bulan as $b)
                            <option value="{{$b->id}}">{{$b->nama}}</option>
                            @endforeach
                        </select>                          
                      </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>                      
                      <script type="text/javascript">
                        $(document).ready(function(){
                            $("#bulan").on('change', function(e){
                                var month = e.target.value;
                                window.location.href="{{URL::to('/kunjungan')}}"+'/'+month
                            });
                        });                        
                      </script>
                	<script src="/charts/dist/Chart.min.js"></script>
                	<script src="/charts/samples/utils.js"></script>
                	<style>
                	canvas {
                		-moz-user-select: none;
                		-webkit-user-select: none;
                		-ms-user-select: none;
                	}
                	</style> 
                    <style>
                        .content {
                          max-width: 1000px;
                          margin: auto;
                          margin-top: 60px;
                          /*background: yellow;*/
                          /*padding: 60px;*/
                        }   
                        .centered {
                          position: fixed;
                          width: 1000px;
                          top: 30%;
                          left: 35%;
                          margin-top: -50px;
                          margin-left: -100px;
                        }                        
                    </style>    	
                    	<div class="content">
                    		<canvas id="canvas"></canvas>
                    	</div>
                    	<script>
                    		var barChartData = {
                    			labels: ['Bulan {{$bln->nama}}'],
                    			datasets: [{
                    				label: 'Jumlah Pasien',
                    				backgroundColor: window.chartColors.blue,
                    				yAxisID: 'y-axis-1',
                            		    @php
                            		        $pasiens = array();
                            		        $total = 0;
                            		        foreach($appo as $a){
                            		            $pasien = $a->getAttribute("pasien");
                            		            if(!in_array($pasien, $pasiens)){
                            		                $total++;
                            		                array_push($pasiens, $pasien);
                            		            }
                            		        }
                            		    @endphp				
                            		data: [
                            		    {{$total}}
                            		]				        
                    				    			
                    				
                    			}, 
                    // 			{
                    // 				label: 'Dibatalkan',
                    // 				backgroundColor: window.chartColors.red,
                    // 				yAxisID: 'y-axis-1',
                    //         		    @php
                    //         		        $total = 0;
                    //         		        foreach($batal as $b){
                    //         		            $total++;
                    //         		        }
                    //         		    @endphp					
                    // 				data: [{{$total}}]
                    // 			}, {
                    // 				label: 'Tidak merespon',
                    // 				backgroundColor: window.chartColors.grey,
                    // 				yAxisID: 'y-axis-1',
                    //         		    @php
                    //         		        $total = 0;
                    //         		        foreach($norespon as $n){
                    //         		            $total++;
                    //         		        }
                    //         		    @endphp					
                    // 				data: [{{$total}}]
                    // 			}
                                ]
                    
                    		};
                    		window.onload = function() {
                    			var ctx = document.getElementById('canvas').getContext('2d');
                    			window.myBar = new Chart(ctx, {
                    				type: 'bar',
                    				data: barChartData,
                    				options: {
                    					responsive: true,
                    					title: {
                    						display: true,
                    						text: 'Detail Kunjungan Bulanan Pasien',
                    						fontSize: 20,
                    					},
                    					tooltips: {
                    						mode: 'index',
                    						intersect: true
                    					},
                    					scales: {
                    					    
                    						yAxes: [{
                    							type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                                                ticks: {
                                                    min: 0,
                                                    max:50,
                                                    // stepSize: 1,
                                                },							
                    							display: true,
                    							position: 'left',
                    							id: 'y-axis-1',
                    						}],
                                            xAxes: [{
                                              ticks: {
                                                fontSize: 17
                                              },
                                              barThickness: 50,
                                            }]                    						
                    					}
                    				}
                    			});
                    		};
                    
                    		document.getElementById('randomizeData').addEventListener('click', function() {
                    			barChartData.datasets.forEach(function(dataset) {
                    				dataset.data = dataset.data.map(function() {
                    					return randomScalingFactor();
                    				});
                    			});
                    			window.myBar.update();
                    		});
                    	</script>                    
                <br>
              </div>          

        <!-- Breadcrumbs-->

        <!-- Chart Example -->

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
@include('layouts.footer')
    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
@include('layouts.scrollbutton')

  <!-- Logout Modal-->
@include('layouts.script')
</body>

</html>
