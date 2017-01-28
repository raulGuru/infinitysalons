<div class="modal fill-in in" id="newServiceModal" tabindex="-1" role="dialog" aria-labelledby="serviceModal" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content no-border">
         <div class="modal-header clearfix text-left">
            <button aria-hidden="true" class="close" data-dismiss="modal"><i class="pg-close"></i></button>
            <h4 class="text-center">New Service</h4>
         </div>
         <div class="new-form">
            <form class="simple_form new_service" id="new_service" name="new_service">
               <div class="form-group hidden service_group_id" data-toggle="validator" role="form"><input value="<?php echo $group_id?>" class="hidden form-control" type="hidden" name="service[group_id]" id="service_group_id">
                  <input value="" class="hidden form-control" type="hidden" name="service[id]" id="service_id">
               </div>
               <div class="modal-body employee-form sm-padding-10 p-t-none">
                  <div class="alert alert-danger hide"></div>
                  <ul class="nav nav-tabs nav-tabs-simple" id="serviceTab">
                     <li class="active">
                        <a data-toggle="tab" href="#details">Details</a>
                     </li>
<!--                     <li>
                        <a data-toggle="tab" href="#staff">Staff</a>
                     </li>-->
                     <li>
                        <a data-toggle="tab" href="#online-booking">Distribution</a>
                     </li>
                  </ul>
                  <div class="tab-content no-padding">
                     <div class="tab-pane active" id="details">
                        <div class="row m-t-20">
                           <div class="col-md-4 left-modal-column-md">
                              <div class="form-group">
                                 <label for="service_name">Service Name</label>
                                 <input class="string optional form-control full-width" autofocus="autofocus" placeholder="e.g. Haircut" type="text" name="service[name]" id="service_name" required>
                              </div>
                              <div class="form-group">
                                 <label for="service_subcategory_id"><span class="translation_missing">Treatment Type</span>
                                 </label>
                                 <div class="select-wrapper">
                                    <select group_method="subcategories" group_label_method="name" class="grouped_select required service-category full-width form-control" include_blank="Select Treatment Type" required="required" name="service[subcategory_id]" id="service_subcategory_id">
                                       <option value="">Select Treatment Type</option>
                                       <optgroup label="Hair">
                                          <option value="105">Airlites</option>
                                          <option value="106">Blow Dry</option>
                                          <option value="107">Brazilian Blow Dry Keratin</option>
                                          <option value="108">Brocato's Smoothing</option>
                                          <option value="109">Hair Colouring and Highlights</option>
                                          <option value="110">Hair Conditioning</option>
                                          <option value="111">Hair Consulting</option>
                                          <option value="112">Hair Extensions</option>
                                          <option value="113">Hair Loss Treatments - non surgical</option>
                                          <option value="114">Hair Transplants</option>
                                          <option value="115">Haircuts and Hairdressing</option>
                                          <option value="116">Japanese Straightening</option>
                                          <option value="117">Permanent Waves</option>
                                          <option value="118">Straighteners</option>
                                          <option value="119">Wedding Hair</option>
                                       </optgroup>
                                       <optgroup label="Body">
                                          <option value="154">Acoustic Wave Therapy</option>
                                          <option value="155">Acupuncture</option>
                                          <option value="156">Akasuri</option>
                                          <option value="157">Arasys Toning &amp; Inch Loss Treatment</option>
                                          <option value="158">Backcials</option>
                                          <option value="159">Bikini Facial</option>
                                          <option value="160">Body Exfoliation Treatments</option>
                                          <option value="161">Body Treatments</option>
                                          <option value="162">Body Treatments - CACI</option>
                                          <option value="163">Body Wraps</option>
                                          <option value="164">Cellulite Treatments</option>
                                          <option value="165">Colonic Hydrotherapy</option>
                                          <option value="166">Colonic Therapy</option>
                                          <option value="167">Cryolipolysis</option>
                                          <option value="168">Cryotherapy</option>
                                          <option value="169">Cupping</option>
                                          <option value="170">Dry Floatation</option>
                                          <option value="171">Electrotherapy</option>
                                          <option value="172">Endermologie Lipo-Massage</option>
                                          <option value="173">Endermotherapy</option>
                                          <option value="174">Fish Spa Full Body Treatment</option>
                                          <option value="175">Floatation</option>
                                          <option value="176">Gua Sha</option>
                                          <option value="177">Heat Treatments</option>
                                          <option value="179">Hydrotherapy</option>
                                          <option value="180">Hyperhidrosis Treatment</option>
                                          <option value="181">i-Lipo</option>
                                          <option value="182">Infrared Therapy</option>
                                          <option value="183">Iyashi Dome</option>
                                          <option value="184">Laser Lipo</option>
                                          <option value="185">Leech Therapy</option>
                                          <option value="186">Lipo-Light</option>
                                          <option value="187">Lipodissolve</option>
                                          <option value="188">Multi Polar Radio Frequency Treatment</option>
                                          <option value="189">No Needle Mesotherapy</option>
                                          <option value="190">Photorejuvenation Treatments</option>
                                          <option value="191">Piercing</option>
                                          <option value="192">Pre-birth Acupuncture</option>
                                          <option value="193">Rasul and Mud Treatments</option>
                                          <option value="194">Russian Banya</option>
                                          <option value="195">Scierotherapy</option>
                                          <option value="196">SmartLipo</option>
                                          <option value="197">Spray Tanning and Sunless Tanning</option>
                                          <option value="198">Steam and Sauna Therapy</option>
                                          <option value="199">Strawberry Laser Lipo</option>
                                          <option value="200">Sun Angel</option>
                                          <option value="201">Sunbeds and Tanning Booths</option>
                                          <option value="202">Taizen Japanese Bath</option>
                                          <option value="203">Tattooing</option>
                                          <option value="178">Henna Designs</option>
                                          <option value="204">Thalassotherapy</option>
                                          <option value="205">Ultrasound Therapy</option>
                                          <option value="206">Universal Contour Wrap</option>
                                          <option value="207">Vaser Lipo-Contouring</option>
                                          <option value="208">Vattooing</option>
                                          <option value="209">VelaShape</option>
                                          <option value="210">VinoTherapy</option>
                                          <option value="211">Weight Loss Treatments</option>
                                       </optgroup>
                                       <optgroup label="Counselling &amp; Holistic ">
                                          <option value="237">Acustaple</option>
                                          <option value="238">Addictions Counselling</option>
                                          <option value="239">Angel Therapy</option>
                                          <option value="240">Anger Management</option>
                                          <option value="241">Aromatherapy</option>
                                          <option value="242">Ayurvedic</option>
                                          <option value="243">Bach Flower Remedies</option>
                                          <option value="244">BioMeridian Analysis</option>
                                          <option value="245">Bioresonance Therapy</option>
                                          <option value="246">BodyTalk</option>
                                          <option value="247">Coaching</option>
                                          <option value="248">Cognitive Behaviour Therapy</option>
                                          <option value="249">Colour Therapy</option>
                                          <option value="250">Combined Decongestive Therapy</option>
                                          <option value="251">Counselling</option>
                                          <option value="252">Crystal Therapy</option>
                                          <option value="253">Doula Birth Companion</option>
                                          <option value="254">Dream Therapy</option>
                                          <option value="255">Ear Candling</option>
                                          <option value="256">Emotional Therapy</option>
                                          <option value="257">Energy Therapy</option>
                                          <option value="258">Feng Shui</option>
                                          <option value="259">Grief Recovery</option>
                                          <option value="260">Halotherapy</option>
                                          <option value="261">Healing</option>
                                          <option value="262">Herbal &amp; Flower Essence</option>
                                          <option value="263">Herbal Medicine and Supplements</option>
                                          <option value="264">Homeopathy</option>
                                          <option value="265">HypnoBirthing</option>
                                          <option value="266">Hypnotherapy</option>
                                          <option value="267">Image Consulting</option>
                                          <option value="268">Intuitive Readings</option>
                                          <option value="269">Ionic Foot Bath</option>
                                          <option value="270">Ionocinesis</option>
                                          <option value="271">Iridology</option>
                                          <option value="272">Ki Therapy</option>
                                          <option value="273">Kinesiology</option>
                                          <option value="274">Life Coaching</option>
                                          <option value="275">Light Therapy</option>
                                          <option value="276">Magnetic Therapy</option>
                                          <option value="277">Meridian Therapies</option>
                                          <option value="278">Metamorphic Technique</option>
                                          <option value="279">Mind Boxing</option>
                                          <option value="280">Mindfulness</option>
                                          <option value="281">Moxibustion</option>
                                          <option value="282">Naturopathy</option>
                                          <option value="283">Neuro Linguistic Programming</option>
                                          <option value="284">NeuroSpa</option>
                                          <option value="285">Nutritional Advice &amp; Treatments</option>
                                          <option value="286">Past Life Regression Therapy</option>
                                          <option value="287">Psychic Love Coaching</option>
                                          <option value="288">Psychology</option>
                                          <option value="289">Phychotherapy</option>
                                          <option value="290">Radionics</option>
                                          <option value="291">Reiki</option>
                                          <option value="292">Sex Counselling</option>
                                          <option value="293">Shamanic Healing</option>
                                          <option value="294">Shirodhara</option>
                                          <option value="295">Sleep Treatments</option>
                                          <option value="296">Somatic Experiencing</option>
                                          <option value="297">Sophrology</option>
                                          <option value="298">Speech Therapy</option>
                                          <option value="299">Stress Management</option>
                                          <option value="300">Styling</option>
                                          <option value="301">The Lightning Process</option>
                                          <option value="302">Thermography</option>
                                          <option value="303">Thought Field Therapy</option>
                                          <option value="304">Timeline Therapy</option>
                                          <option value="305">Traditional Chinese Medicine</option>
                                          <option value="306">Weight Loss Hypnotherapy</option>
                                       </optgroup>
                                       <optgroup label="Face">
                                          <option value="6">Acne Treatments</option>
                                          <option value="5">Auricular Acupuncture</option>
                                          <option value="4">Beauty Treatments</option>
                                          <option value="3">Brow Lift</option>
                                          <option value="9">Camouflage Make-up</option>
                                          <option value="10">Chemical Skin Peel</option>
                                          <option value="11">Dermaplaning</option>
                                          <option value="12">Eye Treatments</option>
                                          <option value="13">Eyebrow and Eyelash Tinting</option>
                                          <option value="14">Eyebrow and Eyelash Treatments</option>
                                          <option value="15">Eyelash Extensions</option>
                                          <option value="16">Eyelash Perming</option>
                                          <option value="17">Face Lift - Nonsurgical</option>
                                          <option value="18">Facial Reflexology</option>
                                          <option value="19">Facial Rejuvenation Acupuncture</option>
                                          <option value="20">Facials</option>
                                          <option value="21">Facials - CACI</option>
                                          <option value="22">Facials - Galvanic</option>
                                          <option value="23">Geisha Facial</option>
                                          <option value="24">HD Brows</option>
                                          <option value="25">Honey Facial</option>
                                          <option value="26">LashDip</option>
                                          <option value="27">Lava Shell Therma Facial</option>
                                          <option value="28">LED Light Therapy</option>
                                          <option value="29">LPG Facelift</option>
                                          <option value="30">LVL Lashes</option>
                                          <option value="31">Makeup Treatments</option>
                                          <option value="32">Micro-Needling</option>
                                          <option value="33">Microcurrent Treatments</option>
                                          <option value="34">Microdermabrasion</option>
                                          <option value="35">Oxygen Facial</option>
                                          <option value="36">Placenta Facial</option>
                                          <option value="37">Semi Permanent Mascara</option>
                                          <option value="38">Silk Peel</option>
                                          <option value="39">Skincare Consultation</option>
                                          <option value="40">Snail Facial</option>
                                          <option value="41">Spermine Facial</option>
                                          <option value="42">Stem Cell Facial</option>
                                          <option value="43">Teen Facial</option>
                                          <option value="44">Wedding Makeup</option>
                                       </optgroup>
                                       <optgroup label="Hair Removal">
                                          <option value="2">Beard Trimming</option>
                                          <option value="120">Brazilian Waxing</option>
                                          <option value="121">Depilation</option>
                                          <option value="122">Ear Hair Trimming</option>
                                          <option value="123">Electrosysis</option>
                                          <option value="124">Epilar</option>
                                          <option value="125">French Bikini Wax</option>
                                          <option value="126">Hollywood Waxing</option>
                                          <option value="127">Intense Pulsed Light Therapy (IPL)</option>
                                          <option value="128">Laser Hair Removal</option>
                                          <option value="129">Male Waxing</option>
                                          <option value="130">Men's Shaving</option>
                                          <option value="131">Nasal Hair Trimming</option>
                                          <option value="132">Penazzling</option>
                                          <option value="133">Shaving Lesson</option>
                                          <option value="134">Soprano Laser Hair Removal</option>
                                          <option value="135">Sugaring</option>
                                          <option value="136">Threading</option>
                                          <option value="137">Vajazzling</option>
                                          <option value="138">Waxing</option>
                                       </optgroup>
                                       <optgroup label="Massage">
                                          <option value="98">Tui Na Massage</option>
                                          <option value="45">Abhyanga Ayurvedic Massage</option>
                                          <option value="46">Acupressure</option>
                                          <option value="47">Aromatherapy Massage</option>
                                          <option value="48">Ashiatsu</option>
                                          <option value="49">Ayurvedic Massages</option>
                                          <option value="50">Balinise Massage</option>
                                          <option value="51">Bamboo Massage</option>
                                          <option value="52">Baobab Massage</option>
                                          <option value="53">Biodynamic Massage</option>
                                          <option value="54">Chair Massage</option>
                                          <option value="55">Chakra Massage</option>
                                          <option value="56">Chavutti Thirumal Massage</option>
                                          <option value="57">Chi Nei Tsang</option>
                                          <option value="58">Children's Massage</option>
                                          <option value="59">Deep Tissue Massage</option>
                                          <option value="60">Esalen Massage</option>
                                          <option value="61">Face Massage</option>
                                          <option value="62">Foot Massage</option>
                                          <option value="63">Four Hands Massage</option>
                                          <option value="64">Garshan</option>
                                          <option value="65">Hand Massage</option>
                                          <option value="66">Herbal Compress Massage</option>
                                          <option value="67">Himalayan Mineral Massage</option>
                                          <option value="68">Honey Massage</option>
                                          <option value="69">Hydrotherm Massage</option>
                                          <option value="70">Indian Head Massage</option>
                                          <option value="71">Khmer Massage</option>
                                          <option value="72">Lava Bambu Massage</option>
                                          <option value="73">Lava Shells Massage</option>
                                          <option value="74">Lomi Lomi Massage</option>
                                          <option value="75">Lymphatic Drainage</option>
                                          <option value="76">Lymphatic Drainage Massage</option>
                                          <option value="77">MELT Method</option>
                                          <option value="78">Neuromuscular Massage Therapy</option>
                                          <option value="79">No Hands Massage</option>
                                          <option value="80">Platza</option>
                                          <option value="81">Pre and Post Natal Massage</option>
                                          <option value="83">Rollerssage</option>
                                          <option value="84">Scar Tissue Massage</option>
                                          <option value="85">Seitai Massage</option>
                                          <option value="86">Shiatsu Massage</option>
                                          <option value="87">Six Hand Massage</option>
                                          <option value="88">Sound Massage</option>
                                          <option value="89">Sports Massage</option>
                                          <option value="90">Srota Ayrvendic Massage</option>
                                          <option value="91">Stone Massage Therapy</option>
                                          <option value="92">Swedish Massage</option>
                                          <option value="93">Thai Foot Massage</option>
                                          <option value="94">Thai Luk Pra Kob Massage</option>
                                          <option value="95">Thai Massage</option>
                                          <option value="96">Therapeutic Massage</option>
                                          <option value="97">Trigger Point Therapy</option>
                                          <option value="99">Turkish Bath</option>
                                          <option value="100">Underwater Massage</option>
                                          <option value="101">Vishesh Ayurvedic Massage</option>
                                          <option value="102">Watsu Massage</option>
                                          <option value="103">Wood Therapy</option>
                                          <option value="104">Moroccan Bath</option>
                                          <option value="82">Reflexology</option>
                                       </optgroup>
                                       <optgroup label="Medical &amp; Dental">
                                          <option value="8">Allergy Testing</option>
                                          <option value="7">Arm Lift</option>
                                          <option value="307">Areola Reconstruction</option>
                                          <option value="308">Biofeedback</option>
                                          <option value="309">Blood Testing</option>
                                          <option value="310">Breast Enlargement</option>
                                          <option value="311">Breast Fillers</option>
                                          <option value="312">Breast Reduction</option>
                                          <option value="313">Bust Treatments and Enhancement</option>
                                          <option value="314">Buttock Implants</option>
                                          <option value="315">Carboxytherapy</option>
                                          <option value="316">Cheek Enhancement</option>
                                          <option value="317">Chicago Facelift</option>
                                          <option value="318">Collagen Treatments</option>
                                          <option value="319">Contact Lenses</option>
                                          <option value="320">Cosmetic Dental Treatments</option>
                                          <option value="321">Cosmetic Injectables</option>
                                          <option value="322">Cosmetic Skin Treatments</option>
                                          <option value="323">Cosmetic Surgery</option>
                                          <option value="324">Dental Treatments</option>
                                          <option value="325">Dermal Fillers</option>
                                          <option value="326">Dermatology</option>
                                          <option value="327">Dracula Therapy</option>
                                          <option value="328">Ear Pinning</option>
                                          <option value="329">Eye Tests</option>
                                          <option value="330">Face Lift</option>
                                          <option value="331">Fertility Testing</option>
                                          <option value="332">Fresh Breath Treatments</option>
                                          <option value="333">Gastric Band</option>
                                          <option value="334">Glasses</option>
                                          <option value="335">Hair Simulation</option>
                                          <option value="336">Health Consultations</option>
                                          <option value="337">Hormone Treatment</option>
                                          <option value="338">Implants (non Breast)</option>
                                          <option value="339">Intraocular Lenses</option>
                                          <option value="340">Isologen Process</option>
                                          <option value="341">Laser Eye Surgery</option>
                                          <option value="342">Laser Treatment - Thread Veins</option>
                                          <option value="343">Laser Treatments - Resurfacing</option>
                                          <option value="344">Laser Treatments - Skin Rejuvenation</option>
                                          <option value="345">Lipo-Injection</option>
                                          <option value="346">Liposuction</option>
                                          <option value="347">Mastopexy</option>
                                          <option value="348">Mesotherapy</option>
                                          <option value="349">Mole Removal</option>
                                          <option value="350">Mole/Cyst Removal</option>
                                          <option value="351">Natural Breast Enlargement</option>
                                          <option value="352">Necklift</option>
                                          <option value="353">Orthodontics</option>
                                          <option value="354">Rhinoplasty</option>
                                          <option value="355">Scalp Reduction</option>
                                          <option value="356">Scar Tissue Treatments</option>
                                          <option value="357">Skin Lightening</option>
                                          <option value="358">Skin Tightening</option>
                                          <option value="359">Tattoo Removal</option>
                                          <option value="360">Teeth Whitening</option>
                                          <option value="361">Thigh Lift</option>
                                          <option value="362">Thread Vein Treatment</option>
                                          <option value="363">Tooth Jewellery</option>
                                          <option value="364">TUG Breast Reconstruction</option>
                                          <option value="365">Tummy Tuck</option>
                                          <option value="366">UVB Photo-Biological Stimulation</option>
                                       </optgroup>
                                       <optgroup label="Nails">
                                          <option value="1">Callus Peel</option>
                                          <option value="139">Fish Analytics</option>
                                          <option value="140">Fish Manicure</option>
                                          <option value="141">Fish Pedicure</option>
                                          <option value="142">Foot Scrub</option>
                                          <option value="143">Gel Nails</option>
                                          <option value="144">Manicure</option>
                                          <option value="145">Minx Nails</option>
                                          <option value="146">Nail Art</option>
                                          <option value="147">Nail Extensions and Overlays</option>
                                          <option value="148">Paraffin Wax Treatments</option>
                                          <option value="149">Pedicure</option>
                                          <option value="150">PerfectSense Paraffin Wax</option>
                                          <option value="151">Snakeskin Manicure</option>
                                          <option value="152">Swarovski Crystal Pedicure</option>
                                          <option value="153">Two Week Manicure</option>
                                       </optgroup>
                                       <optgroup label="Physical Therapy">
                                          <option value="212">Alexander Technique</option>
                                          <option value="213">Amatsu</option>
                                          <option value="214">Arvigo Therapy</option>
                                          <option value="215">Bowen Technique</option>
                                          <option value="217">Chiropractic</option>
                                          <option value="218">Craniosacral Therapy</option>
                                          <option value="219">Dorn Method</option>
                                          <option value="220">Feldenkrais Method</option>
                                          <option value="221">Grinberg Method</option>
                                          <option value="222">Hallerwork</option>
                                          <option value="223">Hippotherapy</option>
                                          <option value="224">Myofascial Release Therapy</option>
                                          <option value="225">Naprapathy</option>
                                          <option value="226">Neuro-skeletal Realignment Therapy</option>
                                          <option value="227">Osteopathy</option>
                                          <option value="228">Passive Exercise</option>
                                          <option value="229">Physiotherapy</option>
                                          <option value="230">Resistance Stretching</option>
                                          <option value="231">Rolfing</option>
                                          <option value="232">SIRPA Recovery Programme</option>
                                          <option value="233">The Emmett Technique</option>
                                          <option value="234">The Rossiter System</option>
                                          <option value="235">Trager Approach</option>
                                          <option value="236">Yumuna Body Rolling</option>
                                          <option value="216">Chiropody</option>
                                       </optgroup>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="service_gender">Available for</label>
                                 <div class="select-wrapper">
                                    <select include_blank="false" class="select optional full-width form-control" name="service[gender]" id="service_gender">
                                       <option value="male">Males only</option>
                                       <option value="female">Females only</option>
                                       <option selected="selected" value="everyone">Everyone</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group tax-rate-field no-margin">
                                 <label for="service_tax_Rate_id">Tax</label>
                                 <div class="select-wrapper">
                                    <select include_blank="Not applicable" class="select optional full-width form-control" name="service[tax_rate_id]" id="service_tax_rate_id">
                                       <option value="">Not applicable</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-8 right-modal-column-md">
                              <div class="form-group sm-m-t-20">
                                 <label for="service_pricing_type">Pricing Type</label>
                                 <div class="select-wrapper">
                                    <select include_blank="false" selected="selected" class="select optional pricing-type full-width form-control" name="service[pricing_type]" id="service_pricing_type">
                                       <option selected="selected" value="single">Single</option>
                                       <option value="multiple">Multiple</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="row pricing-level-labels-row">
                                 <div class="col-sm-3 col-xs-4 col-sm-4">
                                    <div class="form-label">
                                       Duration
                                    </div>
                                 </div>
                                 <div class="col-sm-3 col-xs-4 sm-p-l-0 col-sm-4">
                                    <div class="form-label">
                                       Full price
                                    </div>
                                 </div>
                                 <div class="col-sm-3 col-xs-4 sm-p-l-0 col-sm-4">
                                    <div class="form-label">
                                       Special price
                                    </div>
                                 </div>
                                 <div class="col-sm-3 name-header form-group no-margin col-sm-4" style="display: none;">
                                    <div class="form-label">
                                       Caption
                                    </div>
                                    <span class="help">(optional)</span>
                                 </div>
                              </div>
                              <div class="pricing-level-fields attached-form-group single-service">
                                 <div class="row service-pricing-level">
                                    <h5 class="visible-xs form-label pricing-level-label">Level 1</h5>
                                    <input class="hidden id" type="hidden" name="service[service_pricing_levels_attributes][0][id]" id="service_service_pricing_levels_attributes_0_id">
                                    <input class="hidden destroy" type="hidden" value="false" name="service[service_pricing_levels_attributes][0][_destroy]" id="service_service_pricing_levels_attributes_0__destroy">
                                    <div class="col-sm-3 col-xs-4 col-sm-4">
                                       <div class="form-group no-padding">
                                          <div class="select-wrapper">
                                             <select include_blank="Select duration" required="required" error="false" class="select required form-control" name="service[service_pricing_levels_attributes][0][duration_value]" id="service_service_pricing_levels_attributes_0_duration_value">
                                                <option value="">Select duration</option>
                                                <option value="5">5min</option>
                                                <option value="10">10min</option>
                                                <option value="15">15min</option>
                                                <option value="20">20min</option>
                                                <option value="25">25min</option>
                                                <option value="30">30min</option>
                                                <option value="35">35min</option>
                                                <option value="40">40min</option>
                                                <option value="45">45min</option>
                                                <option value="50">50min</option>
                                                <option value="55">55min</option>
                                                <option value="60">1h</option>
                                                <option value="65">1h 5min</option>
                                                <option value="70">1h 10min</option>
                                                <option value="75">1h 15min</option>
                                                <option value="80">1h 20min</option>
                                                <option value="85">1h 25min</option>
                                                <option value="90">1h 30min</option>
                                                <option value="95">1h 35min</option>
                                                <option value="100">1h 40min</option>
                                                <option value="105">1h 45min</option>
                                                <option value="110">1h 50min</option>
                                                <option value="115">1h 55min</option>
                                                <option value="120">2h</option>
                                                <option value="135">2h 15min</option>
                                                <option value="150">2h 30min</option>
                                                <option value="165">2h 45min</option>
                                                <option value="180">3h</option>
                                                <option value="195">3h 15min</option>
                                                <option value="210">3h 30min</option>
                                                <option value="225">3h 45min</option>
                                                <option value="240">4h</option>
                                                <option value="270">4h 30min</option>
                                                <option value="300">5h</option>
                                                <option value="330">5h 30min</option>
                                                <option value="360">6h</option>
                                                <option value="390">6h 30min</option>
                                                <option value="420">7h</option>
                                                <option value="450">7h 30min</option>
                                                <option value="480">8h</option>
                                                <option value="540">9h</option>
                                                <option value="600">10h</option>
                                                <option value="660">11h</option>
                                                <option value="720">12h</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-4 col-sm-4">
                                       <div class="form-group">
                                          <input class="numeric decimal optional form-control add-decimals" placeholder="0.00" type="number" step="any" name="service[service_pricing_levels_attributes][0][service_pricing_price]" id="service_service_pricing_levels_attributes_0_price" value="">
                                       </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-4 col-sm-4">
                                       <div class="form-group multi-level-special-price">
                                          <input class="numeric decimal optional form-control add-decimals attached-field-last" placeholder="0.00" type="number" step="any" name="service[service_pricing_levels_attributes][0][service_pricing_special_price]" id="service_service_pricing_levels_attributes_0_special_price" value="<?php echo $service['special_price']; ?>">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row m-t-20 attached-fields sm-m-t-20">
                                 <div class="col-sm-9 col-xs-6 no-padding">
                                    <div class="form-group no-margin middle-item">
                                       <label for="service_extra_time_type">Extra time type</label>
                                       <div class="select-wrapper">
                                          <select include_blank="No extra time" class="select required js-extra-time-type form-control"  name="service[extra_time_type]" id="service_extra_time_type">
                                             <option selected="selected" value="">No extra time</option>
                                             <option value="processing">Processing time after</option>
                                             <option value="blocking">Blocked time after</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-3 col-xs-6 no-padding">
                                    <div class="form-group no-margin">
                                       <label for="service_extra_time_in_seconds">Duration</label>
                                       <div class="select-wrapper">
                                          <select include_blank="Select duration" class="select optional js-extra-time-duration form-control" name="service[extra_time_in_seconds]" id="service_extra_time_in_seconds" disabled="">
                                             <option value="">Select duration</option>
                                             <option value="300">5min</option>
                                             <option value="600">10min</option>
                                             <option value="900">15min</option>
                                             <option value="1200">20min</option>
                                             <option value="1500">25min</option>
                                             <option value="1800">30min</option>
                                             <option value="2100">35min</option>
                                             <option value="2400">40min</option>
                                             <option value="2700">45min</option>
                                             <option value="3000">50min</option>
                                             <option value="3300">55min</option>
                                             <option value="3600">1h</option>
                                             <option value="3900">1h 5min</option>
                                             <option value="4200">1h 10min</option>
                                             <option value="4500">1h 15min</option>
                                             <option value="4800">1h 20min</option>
                                             <option value="5100">1h 25min</option>
                                             <option value="5400">1h 30min</option>
                                             <option value="5700">1h 35min</option>
                                             <option value="6000">1h 40min</option>
                                             <option value="6300">1h 45min</option>
                                             <option value="6600">1h 50min</option>
                                             <option value="6900">1h 55min</option>
                                             <option value="7200">2h</option>
                                             <option value="8100">2h 15min</option>
                                             <option value="9000">2h 30min</option>
                                             <option value="9900">2h 45min</option>
                                             <option value="10800">3h</option>
                                             <option value="11700">3h 15min</option>
                                             <option value="12600">3h 30min</option>
                                             <option value="13500">3h 45min</option>
                                             <option value="14400">4h</option>
                                             <option value="16200">4h 30min</option>
                                             <option value="18000">5h</option>
                                             <option value="19800">5h 30min</option>
                                             <option value="21600">6h</option>
                                             <option value="23400">6h 30min</option>
                                             <option value="25200">7h</option>
                                             <option value="27000">7h 30min</option>
                                             <option value="28800">8h</option>
                                             <option value="32400">9h</option>
                                             <option value="36000">10h</option>
                                             <option value="39600">11h</option>
                                             <option value="43200">12h</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane selection-list" id="staff">
                        <input type="hidden" name="service[employee_ids][]" id="service_employee_ids_" value="">
                        <div class="select-all-items m-b-20">
                           <div class="checkbox m-l-15 m-b-15 check-success">
                              <input type="checkbox" name="all-employee-ids" id="all-employee-ids" value="1" checked="checked" class="select-all-items">
                              <label for="all-employee-ids">Select All</label>
                           </div>
                        </div>
                        <ul class="selection-list row">
                           <div class="col-md-6">
                              <li>
                                 <div class="checkbox check-success">
                                    <input type="checkbox" name="service[employee_ids][]" id="service-selection-list-121193" value="121193" data-option-for="all-employee-ids" checked="checked">
                                    <label for="service-selection-list-121193"><b>raa gg</b></label>
                                 </div>
                              </li>
                           </div>
                        </ul>
                     </div>
                     <div class="tab-pane" id="online-booking">
                        <div class="row m-t-20">
                           <div class="col-md-6 left-modal-column-md">
                              <div class="form-group">
                                 <div class="checkbox check-success">
                                    <input name="service[voucher_enabled]" type="hidden" value="0"><input class="voucher-enabled" type="checkbox" value="1" checked="checked" name="service[voucher_enabled]" id="service_voucher_enabled">
                                    <label class="no-margin" for="service_voucher_enabled">Enable voucher sales
                                    <i class="icon-question-circle hint-icon" title="Enable voucher sales for this service"></i>
                                    </label>
                                    <div class="help visible-xs">
                                       Enable voucher sales for this service
                                    </div>
                                 </div>
                              </div>
                              <div class="voucher-expiration-container">
                                 <div class="form-group">
                                    <label for="service_voucher_expiration_period">Voucher expiry period</label>
                                    <div class="select-wrapper">
                                       <select include_blank="false" class="select optional form-control" name="service[voucher_expiration_period]" id="service_voucher_expiration_period">
                                          <option selected="selected" value="default">Default (6 Months)</option>
                                          <option value="months_1">1 Month</option>
                                          <option value="months_2">2 Months</option>
                                          <option value="months_3">3 Months</option>
                                          <option value="months_6">6 Months</option>
                                          <option value="years_1">1 Year</option>
                                          <option value="never">No Expiry</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 right-modal-column-md">
                              <div class="form-group text optional service_description"><label class="text optional control-label" for="service_description">Service Description</label><textarea rows="5" class="text optional form-control" placeholder="e.g. the world's most spectacular service" name="service[description]" id="service_description"></textarea></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button aria-hidden="" class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
                  <button class="btn btn-success">Save</button>
                  <?php if(!empty($service['id'])) { ?>
                  <div class="pull-left">
                     <a class="btn btn-danger " id="deleteBtn" href="javascript:void(0);" data-id="<?php echo $service['id']; ?>">Delete</a>
                  </div>
                  <?php } ?>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<script>
   $('#deleteBtn').click(function(){
       $.ajax({
           url: g.base_url + 'services/deleteService',
           type: 'post',   
           dataType: 'json',
           data: { id : $(this).data('id') },
           success: function(data) {
               //location.reload();
               window.location = g.base_url + 'services';
           }
       });
   });
   
   
   
   load_edit();    
   function load_edit() {
    if('<?php echo $mode; ?>' == 'edit') {
    var service = <?php echo json_encode($service); ?>;
     $('#service_name').val(service['name']);
    $('#service_subcategory_id').val(service['subcategory_id']);
    $('#service_id').val(service['id']);
    $('#service_gender option[value="'+ service['gender'] +'"]').attr('selected','selected');
    $('#service_pricing_type option[value="'+service['pricing_type']+'"]').attr('selected','selected');
    $('#service_service_pricing_levels_attributes_0_duration_value option[value="'+service['duration']+'"]').attr('selected','selected');
    $('#service_service_pricing_levels_attributes_0_price').val(service['price']);
    $('#service_service_pricing_levels_attributes_0_special_price').val(service['special_price']);
    $('#service_extra_time_type option[value="'+service['extra_time_type']+'"]').attr('selected','selected');
    $('#service_extra_time_in_seconds option[value="'+service['extra_time_in_seconds']+'"]').attr('selected','selected');
    $(".voucher-enabled").prop( "checked", service['voucher_enabled'] );
    $('#service_voucher_expiration_period option[value="'+service['voucher_expiration_period']+'"]').attr('selected','selected');
    $('#service_description').val(service['description']);

    }
   }   
   
   $("#service_extra_time_type").change(function () {
   if($(this).val() != "") {
       $('#service_extra_time_in_seconds').prop("disabled", false);        
   }else {
       $('#service_extra_time_in_seconds').val("").prop("disabled", true);
   }
   });
   
   $("#new_service").validator().on("submit", function (event) {
   if (event.isDefaultPrevented()) {
       
   } else {
       event.preventDefault();
       $.ajax({
           url: g.base_url + 'services/addService',
           type: 'post',   
           dataType: 'json',
           data: $('form#new_service').serialize(),
           success: function(data) {
               if(data.success){
                   //location.reload();
                   window.location = g.base_url + 'services';
               }
               else{
                   $('.alert-danger').removeClass('hide').html(data.error)
               }
           }
       });       
   }
   });
   
</script>