<?php require('includes/config.php');?>
<?php require('layouts/header2.php');?>

<!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center text-light" style="background-image: url(img/APT.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>ADVANCED PERSISTENT THREAT(APT).</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>                        
                        <li class="active">ADVANCED PERSISTENT THREAT(APT)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

   <!-- Start Blog
    ============================================= -->
    <div class="blog-area single full-blog right-sidebar full-blog default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="blog-content col-md-8">
                        <div class="single-item item">

                            <!-- Start Post Thumb -->
                            <div class="thumb">
                                <a href="#">
                                    <img src="img/APT.png" alt="Thumb">
                                    <div class="post-type">
                                        <i class="ti-image"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- Start Post Thumb -->

                            <div class="info">
                                <div class="meta tags">
                                </div>
                                <h2>
                                Advanced Persistent Threat (APT) Attack and Zero-Day Protection.
                                </h2>
                                <p>
                                Traditional protections, like traditional and next-generation firewalls (NGFW), intrusion prevention systems (IPS), anti-virus (AV) and Web gateways, only scan for the first move, the inbound attack. These systems rely heavily on signatures and known patterns of misbehavior to identify and block threats. This leaves a gaping hole in network defenses that remain vulnerable to zero-day and targeted advanced persistent threat (APT) attacks. 
                                </p>                                                               
                                <p>
                                For example, consider the time lag in signature development due to the need for vulnerability disclosure and/or the mass spread of an attack to catch the attention of researchers. Malicious code is identified over the course of a few days as it spreads. However, polymorphic code tactics counter-balance the effects of signature-based removal. 
                                </p>

                                <p>
                                Signatures represent a reactive mechanism against known threats. However, if attacks remain below the radar, the malware is completely missed, and the network remains vulnerable especially to zero-day, targeted advanced persistent threats. No matter how malicious the code is, if signature-based tools haven't seen it before, they let it through.
                                </p>

                                <p>
                                Heuristic-based protection alone has not proven to be operationally effective. They use rough algorithms to estimate suspicious behavior generating lots of false alerts. While these heuristic techniques have merit, the true positive to false positive ratio (a.k.a. signal-to-noise ratio) is too low for a cost-effective ROI. The false positives clutter up security event logs and real-time blocking based on these heuristic alerts is simply not an option. Administrators often "dumb down" available heuristics to catch only the most obvious suspicious behavior. Multi-stage targeted attacks don't trip this coarse-grained filter.
                                </p>
                                <p>
                                Cybercriminals have figured out how to evade detection by bypassing traditional defenses. Using toolkits to design polymorphic threats that change with every use, move slowly, and exploit zero-day vulnerabilities, the criminals have broken in through the hole left by traditional and next-generation firewalls, IPS, anti-virus and Web gateways. This new generation of organized cybercrime is persistent, capitalizing on organizational data available on social networking sites to create very targeted 'phishing' emails and malware targeted at the types of applications and operating systems (with all their vulnerabilities) typical in particular industries.
                                </p>

                                <p>
                                Once inside, advanced malware, zero-day and targeted APT attacks will hide, replicate, and disable host protections. After it installs, it phones home to its command and control (CnC) server for instructions, which could be to steal data, infect other endpoints, allow reconnaissance, or lie dormant until the attacker is ready to strike. Attacks succeed in this second communication stage because few technologies monitor outbound malware transmissions. Administrators remain unaware of the hole in their networks until the damage is done.
                                </p>

                                <p>
                                APTs can be characterized by the attackers’ quest to gain long-term control of compromised computer systems. Whether attackers use viruses, Trojans, spyware, rootkits, spear phishing, malicious email attachments or drive-by downloads; their malware enables the simple disruption or long-term control of compromised machines. APTs can be nation-state or rogue actors using completely unknown malware or buying access to systems previously compromised with known malware installed through social engineering, spear phishing, or drive-by downloads.
                                </p>


                            </div>                            
                        </div>
                    </div>
                    <?php require('layouts/sidebar.php')?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

    <?php require('layouts/footer.php')?>