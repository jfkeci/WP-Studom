
<?php

get_header();

?>
            
            
            <!-- About Start -->
            <div class="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="about-img">
                                <!-- <img src="img/about.jpg" alt="Image"> -->
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="about-text">
                                <!-- <h2><span>10</span> Years Experience</h2> -->
                                <p>
									Studentski dom Virovitica otvoren je 30. kolovoza 2017. godine. Kapacitet Doma, ukupne veličine 2.287,87 m2 je 108 ležajeva. Investitor projekta je Visoka škola za menadžment u turizmu i informatici u Virovitici, a financiranje se temelji na Ugovoru o dodjeli bespovratnih sredstava za projekte financirane iz Europskih strukturnih i investicijskih fondova.
								</p>
								<p>
									Korisnicima Studentskog doma Virovitica smještaj je omogućen u jednokrevetnim i dvokrevetnim sobama. Na raspolaganju su boravak za zajedničko druženje korisnika, informatička učionica te besplatni WiFi u svim prostorijama. Studentski dom Virovitica opremljen je profesionalnim perilicama i sušilicama rublja te uređajima za glačanje.
								</p>
                                <a class="btn" href="">Vidi više</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="service">
                <div class="container">
                    <div class="section-header">
                        <p>Novosti</p>
                        <h2>Budite u toku</h2>
                    </div>
                    <div class="row">
                        <?php

                        $counter = 0;
                        $args = array(
                            'numberposts' => 4,
                            'category_name' => 'novosti'
                        );
                    
                        $oResults = get_posts($args);
                    
                        $sResultThumbnail = "";
                    
                        $sHtml = '';
                    
                        foreach ($oResults as $result)
                        {
                            $sResultThumbnail = "";
                            if (get_the_post_thumbnail_url($result->ID))
                            {
                                $sResultThumbnail = get_the_post_thumbnail_url($result->ID);
                            }
                        
                            $sUrl = get_permalink($result->ID);
                            $sResultTitle = $result->post_title;
                        
                            $sHtml .= '<div class="col-lg-3 col-md-6">
                                            <div class="service-item">
                                                <img src="' . $sResultThumbnail . '" alt="">
                                                <a href="' . $sUrl . '" class=""><h3>' . $sResultTitle . '</h3></a>
                                                <p>
                                                    '. the_excerpt().'
                                                </p>
                                                <a class="btn" href="' . $sUrl . '">Vidi više</a>
                                            </div>
                                        </div>';
                        }
                        
                        $sHtml .= '</div>';
                        echo $sHtml;

                        ?>

                    </div>
                </div>
            </div>

            <div class="testimonial">
                <div class="container">
                    <div class="section-header">
                        <p>Osoblje</p>
                        <h2>Naš tim</h2>
                    </div>
                    <div class="owl-carousel testimonials-carousel">
                        
                        <?php

                            $sHtml = "";
                            $args = array(
                                'numberposts' => 5,
                                'post_type' => 'osoblje',
                                'post_status' => 'publish'
                            );
                            $lOsoblje = get_posts($args);

                            $sThumbnailOsoblje = "";
                            $sOsobljeRadnoMjesto="";
                            
                            foreach ($lOsoblje as $clan)
                            {
                                    if (get_the_post_thumbnail_url($clan->ID))
                                    {
                                        $sThumbnailOsoblje = get_the_post_thumbnail_url($clan->ID);
                                    }
                                    else
                                    {
                                        $sThumbnailOsoblje = get_template_directory_uri() . '/images/profile.png';
                                    }
                                
                                    $lMjestaRada = wp_get_post_terms($clan->ID, 'mjesto_rada');
                                    foreach ($lMjestaRada as $mjesta_rada)
                                    {
                                        $sOsobljeRadnoMjesto = $mjesta_rada->name;
                                    }
                                
                                    $sUrl = get_permalink($clan->ID);
                                    $sOsobljeNaziv = $clan->post_title;

                                    $sHtml .= '<div class="testimonial-item">
                                                    <div class="testimonial-img">
                                                        <img href="' . $sUrl . '" src="' . $sThumbnailOsoblje . '" alt="">
                                                    </div>
                                                    <div class="testimonial-content">
                                                        <p>
                                                        ' . $sOsobljeRadnoMjesto . '
                                                        </p>
                                                        <a href="' . $sUrl . '" class=""><h3>' . $sOsobljeNaziv . '</h3></a>
                                                    </div>
                                                </div>';
                            }

                            echo $sHtml;

                        ?>

                    </div>
                </div>
            </div>
                        

            <div class="team">
                <div class="container">
                    <div class="section-header">
                        <h2>Dodatni sadržaj</h2>
                    </div>
                    <div class="row">

                    <?php  
                    
                    $sHtml = "";
                    $counter = 0;
                    $args = array(
                        'numberposts' => 4,
                        'post_type' => 'dodatni_sadrzaj',
                        'post_status' => 'publish'
                    );
                
                    $sThumbnailSadrzaj = "";
                    $lSadrzaj = get_posts($args);
                
                    foreach ($lSadrzaj as $sadrzaj)
                    {
                        if (get_the_post_thumbnail_url($sadrzaj->ID))
                        {
                            $sThumbnailSadrzaj = get_the_post_thumbnail_url($sadrzaj->ID);
                        }
                        else
                        {
                            $sThumbnailSadrzaj = get_template_directory_uri() . '/images/profile.png';
                        }
                    
                        $sUrl = get_permalink($sadrzaj->ID);
                        $sSadrzajNaziv = $sadrzaj->post_title;
                        $sSadrzaj = $sadrzaj->post_content;
                    
                        $sHtml .= '<div class="col-lg-3 col-md-6">
                                        <div class="team-item">
                                            <div class="team-img">
                                                <img href="' . $sUrl . '" src="' . $sThumbnailSadrzaj . '" alt="' . $sSadrzajNaziv . '">
                                            </div>
                                            <div class="team-text">
                                                <a href="' . $sUrl . '" class=""><h2>' . $sSadrzajNaziv . '</h2></a>
                                                <h3>' . $sSadrzaj . '</h3>
                    
                                            </div>
                                        </div>
                                    </div>';
                    }
                    echo $sHtml;

                    ?>
                        
                    </div>
                </div>
            </div>
            
            <div class="call-to-action">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-9">
                            <h2>Zanima vas Visoka Škola?</h2>
                            <p>
                                Posjetite link
                            </p>
                        </div>
                        <div class="col-md-3">
                            <a class="btn" href="https://vsmti.hr/">Vidi</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="faqs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="section-header left">
                                <p>Obavijesti</p>
                                <h2>Budite u toku</h2>
                            </div>
                            <img src="img/faqs.jpg" alt="Image">
                        </div>
                        <div class="col-md-7">
                            <div id="accordion">
                                
                            <?php
                            
                            $sHtml = "";
                            $counter = 0;
                            $args = array(
                                'numberposts' => 4,
                                'category_name' => 'obavijesti',
                                'post_status' => 'publish'
                            );
                        
                            $oResults = get_posts($args);
                        
                            foreach ($oResults as $result)
                            {
                                $counter++;
                                $sUrl = get_permalink($result->ID);
                                $sResultTitle = $result->post_title;
                                $sResultContent = $result->post_content;
                                $collapseID='collapse'.$result->ID;
                            
                                $sHtml .= '<div class="card">
                                            <div class="card-header">
                                                <a class="card-link" data-toggle="collapse" href="#' . $collapseID . '" aria-expanded="true">
                                                    <span>'.$counter.'</span> ' . $sResultTitle . '
                                                </a>
                                            </div>
                                            <div id="' . $collapseID . '" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    ' . shortenContent($sResultContent) . '
                                                    <p>'.get_the_date('Y-m-d', $result->ID).'</p>
                                                </div>
                                            </div>
                                        </div>';
                            }
                            echo $sHtml;
                            
                            ?>
                            
                            </div>
                            <a class="btn" href="http://localhost/studom/category/obavijesti/">Vidi obavijesti</a>
                        </div>
                    </div>
                </div>
            </div>

<?php

get_footer();

?>



