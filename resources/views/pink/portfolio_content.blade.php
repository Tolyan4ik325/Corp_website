<div id="content-page" class="content group">
				            <div class="clear"></div>
				            <div class="posts">
				                <div class="group portfolio-post internal-post">

				                	@if($portfolio)

				                    <div id="portfolio" class="portfolio-full-description">
				                        
				                        <div class="fulldescription_title gallery-filters">
				                            <h1>{{ $portfolio->title }}</h1>
				                        </div>
				                        
				                        <div class="portfolios hentry work group">
				                            <div class="work-thumbnail">
				                                <a class="thumb"><img src="{{asset(env('THEME'))}}/images/projects/{{$portfolio->img->max}}" alt="0081" title="0081" /></a>
				                            </div>
				                            <div class="work-description">
				                                <p>{{$portfolio->text}}</p>
				                                <div class="clear"></div>
				                                <div class="work-skillsdate">
				                                    <p class="skills"><span class="label">Skills:</span> {{ $portfolio->filter->title }}</p>
				                                    <p class="workdate"><span class="label">Customer:</span> {{$portfolio->customer }}</p>
				                                    <p class="workdate"><span class="label">Year:</span> {{ $portfolio->created_at->format('Y') }}</p>
				                                </div>
				                            </div>
				                            <div class="clear"></div>
				                        </div>
				                        
				                        <div class="clear"></div>
				                        
				                        <h3>Other Projects</h3>
				                        
				                        <div class="portfolio-full-description-related-projects">
				                            
				                            <div class="related_project">
				                                <a class="related_proj related_img" href="#" title="Love"><img src="images/projects/0061-175x175.jpg" alt="0061" title="0061" /></a>
				                                <h4><a href="#">Love</a></h4>
				                            </div>
				                            
				                            <div class="related_project">
				                                <a class="related_proj related_img" href="#" title="Kineda"><img src="images/projects/0071-175x175.jpg" alt="0071" title="0071" /></a>
				                                <h4><a href="#">Kineda</a></h4>
				                            </div>
				                            
				                            <div class="related_project">
				                                <a class="related_proj related_img" href="#" title="Guanacos"><img src="images/projects/009-175x175.jpg" alt="009" title="009" /></a>
				                                <h4><a href="#">Guanacos</a></h4>
				                            </div>
				                            
				                            <div class="related_project">
				                                <a class="related_proj related_img" href="#" title="Miller Bob"><img src="images/projects/0011-175x175.jpg" alt="0011" title="0011" /></a>
				                                <h4><a href="#">Miller Bob</a></h4>
				                            </div>
				                            
				                            <div class="related_project">
				                                <a class="related_proj related_img" href="#" title="VItale Premium"><img src="images/projects/0027-175x175.jpg" alt="0027" title="0027" /></a>
				                                <h4><a href="#">VItale Premium</a></h4>
				                            </div>
				                            
				                            <div class="related_project_last related_project">
				                                <a class="related_proj related_img" href="#" title="Nili Studios"><img src="images/projects/0034-175x175.jpg" alt="0034" title="0034" /></a>
				                                <h4><a href="#">Nili Studios</a></h4>
				                            </div>
				                            
				                            <div class="related_project">
				                                <a class="related_proj related_img" href="#" title="Digitpool Medien"><img src="images/projects/0043-175x175.jpg" alt="0043" title="0043" /></a>
				                                <h4><a href="#">Digitpool Medien</a></h4>
				                            </div>
				                            
				                            <div class="related_project">
				                                <a class="related_proj related_img" href="#" title="Octopus"><img src="images/projects/0052-175x175.jpg" alt="0052" title="0052" /></a>
				                                <h4><a href="#">Octopus</a></h4>
				                            </div>
				                            
				                        </div>
				                    </div>

				                    @endif
				                    <div class="clear"></div>
				                </div>
				            </div>
				        </div>