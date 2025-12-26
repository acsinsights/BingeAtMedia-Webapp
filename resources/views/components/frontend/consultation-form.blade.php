@props([
    'formType' => 'service_consultation',
    'showCountryCode' => true,
    'formId' => 'consultationForm',
    'showMessage' => false,
    'showConsent' => false,
])

@php
    $uniqueId = uniqid('consultation_');
    $flagDisplayId = $uniqueId . '_flagDisplay';
    $flagImageId = $uniqueId . '_flagImage';
    $countryCodeId = $uniqueId . '_countryCode';
@endphp

<div class="wized-body">
    @if (session('success') && request()->route()->getName() === \Illuminate\Support\Facades\Route::currentRouteName())
        <div class="alert alert-success mb-3"
            style="padding: 12px; background-color: #d4edda; color: #155724; border-radius: 5px; border: 1px solid #c3e6cb;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mb-3"
            style="padding: 12px; background-color: #f8d7da; color: #721c24; border-radius: 5px; border: 1px solid #f5c6cb;">
            <ul class="mb-0" style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="contact-form-widget consultation-form-component" id="{{ $formId }}"
        action="{{ route('frontend.consultation.submit') }}" method="POST" data-form-id="{{ $uniqueId }}">
        @csrf
        <input type="hidden" name="form_type" value="{{ $formType }}">
        <input type="hidden" name="source_page" value="{{ \Illuminate\Support\Facades\Route::currentRouteName() }}">

        <div class="form-group">
            <input type="text" name="name" placeholder="Your Full Name" value="{{ old('name') }}" required />
        </div>

        <div class="form-group">
            <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required />
        </div>

        @if ($showCountryCode)
            <div class="form-group phone-input-group">
                <div class="phone-input-container">
                    <div class="country-selector">
                        <div class="flag-display" id="{{ $flagDisplayId }}">
                            <img src="https://flagcdn.com/w20/ae.png" alt="UAE Flag" id="{{ $flagImageId }}" />
                        </div>
                        <select name="country_code" id="{{ $countryCodeId }}" required>
                            <option value="+971" data-flag="https://flagcdn.com/w20/ae.png" data-country="UAE">+971
                            </option>
                            <option value="+966" data-flag="https://flagcdn.com/w20/sa.png"
                                data-country="Saudi Arabia">+966</option>
                            <option value="+965" data-flag="https://flagcdn.com/w20/kw.png" data-country="Kuwait">+965
                            </option>
                            <option value="+974" data-flag="https://flagcdn.com/w20/qa.png" data-country="Qatar">+974
                            </option>
                            <option value="+973" data-flag="https://flagcdn.com/w20/bh.png" data-country="Bahrain">
                                +973</option>
                            <option value="+968" data-flag="https://flagcdn.com/w20/om.png" data-country="Oman">+968
                            </option>
                            <option value="+1" data-flag="https://flagcdn.com/w20/us.png" data-country="USA">+1
                            </option>
                            <option value="+44" data-flag="https://flagcdn.com/w20/gb.png" data-country="UK">+44
                            </option>
                            <option value="+91" data-flag="https://flagcdn.com/w20/in.png" data-country="India">+91
                            </option>
                            <option value="+86" data-flag="https://flagcdn.com/w20/cn.png" data-country="China">+86
                            </option>
                            <option value="+33" data-flag="https://flagcdn.com/w20/fr.png" data-country="France">+33
                            </option>
                            <option value="+49" data-flag="https://flagcdn.com/w20/de.png" data-country="Germany">+49
                            </option>
                            <option value="+81" data-flag="https://flagcdn.com/w20/jp.png" data-country="Japan">+81
                            </option>
                            <option value="+82" data-flag="https://flagcdn.com/w20/kr.png"
                                data-country="South Korea">+82</option>
                            <option value="+65" data-flag="https://flagcdn.com/w20/sg.png" data-country="Singapore">
                                +65</option>
                            <option value="+60" data-flag="https://flagcdn.com/w20/my.png" data-country="Malaysia">
                                +60</option>
                            <option value="+66" data-flag="https://flagcdn.com/w20/th.png" data-country="Thailand">
                                +66</option>
                            <option value="+63" data-flag="https://flagcdn.com/w20/ph.png"
                                data-country="Philippines">+63</option>
                            <option value="+62" data-flag="https://flagcdn.com/w20/id.png" data-country="Indonesia">
                                +62</option>
                            <option value="+84" data-flag="https://flagcdn.com/w20/vn.png" data-country="Vietnam">+84
                            </option>
                            <option value="+61" data-flag="https://flagcdn.com/w20/au.png"
                                data-country="Australia">+61</option>
                            <option value="+64" data-flag="https://flagcdn.com/w20/nz.png"
                                data-country="New Zealand">+64</option>
                            <option value="+7" data-flag="https://flagcdn.com/w20/ru.png" data-country="Russia">
                                +7</option>
                            <option value="+39" data-flag="https://flagcdn.com/w20/it.png" data-country="Italy">
                                +39</option>
                            <option value="+34" data-flag="https://flagcdn.com/w20/es.png" data-country="Spain">
                                +34</option>
                            <option value="+31" data-flag="https://flagcdn.com/w20/nl.png"
                                data-country="Netherlands">+31</option>
                            <option value="+32" data-flag="https://flagcdn.com/w20/be.png" data-country="Belgium">
                                +32</option>
                            <option value="+41" data-flag="https://flagcdn.com/w20/ch.png"
                                data-country="Switzerland">+41</option>
                            <option value="+43" data-flag="https://flagcdn.com/w20/at.png" data-country="Austria">
                                +43</option>
                            <option value="+46" data-flag="https://flagcdn.com/w20/se.png" data-country="Sweden">
                                +46</option>
                            <option value="+47" data-flag="https://flagcdn.com/w20/no.png" data-country="Norway">
                                +47</option>
                            <option value="+45" data-flag="https://flagcdn.com/w20/dk.png" data-country="Denmark">
                                +45</option>
                            <option value="+358" data-flag="https://flagcdn.com/w20/fi.png" data-country="Finland">
                                +358</option>
                            <option value="+48" data-flag="https://flagcdn.com/w20/pl.png" data-country="Poland">
                                +48</option>
                            <option value="+420" data-flag="https://flagcdn.com/w20/cz.png"
                                data-country="Czech Republic">+420</option>
                            <option value="+36" data-flag="https://flagcdn.com/w20/hu.png" data-country="Hungary">
                                +36</option>
                            <option value="+40" data-flag="https://flagcdn.com/w20/ro.png" data-country="Romania">
                                +40</option>
                            <option value="+359" data-flag="https://flagcdn.com/w20/bg.png"
                                data-country="Bulgaria">+359</option>
                            <option value="+385" data-flag="https://flagcdn.com/w20/hr.png" data-country="Croatia">
                                +385</option>
                            <option value="+386" data-flag="https://flagcdn.com/w20/si.png"
                                data-country="Slovenia">+386</option>
                            <option value="+421" data-flag="https://flagcdn.com/w20/sk.png"
                                data-country="Slovakia">+421</option>
                            <option value="+370" data-flag="https://flagcdn.com/w20/lt.png"
                                data-country="Lithuania">+370</option>
                            <option value="+371" data-flag="https://flagcdn.com/w20/lv.png" data-country="Latvia">
                                +371</option>
                            <option value="+372" data-flag="https://flagcdn.com/w20/ee.png" data-country="Estonia">
                                +372</option>
                            <option value="+30" data-flag="https://flagcdn.com/w20/gr.png" data-country="Greece">
                                +30</option>
                            <option value="+351" data-flag="https://flagcdn.com/w20/pt.png"
                                data-country="Portugal">+351</option>
                            <option value="+353" data-flag="https://flagcdn.com/w20/ie.png" data-country="Ireland">
                                +353</option>
                            <option value="+354" data-flag="https://flagcdn.com/w20/is.png" data-country="Iceland">
                                +354</option>
                            <option value="+376" data-flag="https://flagcdn.com/w20/ad.png" data-country="Andorra">
                                +376</option>
                            <option value="+377" data-flag="https://flagcdn.com/w20/mc.png" data-country="Monaco">
                                +377</option>
                            <option value="+378" data-flag="https://flagcdn.com/w20/sm.png"
                                data-country="San Marino">+378</option>
                            <option value="+423" data-flag="https://flagcdn.com/w20/li.png"
                                data-country="Liechtenstein">+423</option>
                            <option value="+352" data-flag="https://flagcdn.com/w20/lu.png"
                                data-country="Luxembourg">+352</option>
                            <option value="+356" data-flag="https://flagcdn.com/w20/mt.png" data-country="Malta">
                                +356</option>
                            <option value="+357" data-flag="https://flagcdn.com/w20/cy.png" data-country="Cyprus">
                                +357</option>
                            <option value="+20" data-flag="https://flagcdn.com/w20/eg.png" data-country="Egypt">
                                +20</option>
                            <option value="+212" data-flag="https://flagcdn.com/w20/ma.png" data-country="Morocco">
                                +212</option>
                            <option value="+213" data-flag="https://flagcdn.com/w20/dz.png" data-country="Algeria">
                                +213</option>
                            <option value="+216" data-flag="https://flagcdn.com/w20/tn.png" data-country="Tunisia">
                                +216</option>
                            <option value="+218" data-flag="https://flagcdn.com/w20/ly.png" data-country="Libya">
                                +218</option>
                            <option value="+220" data-flag="https://flagcdn.com/w20/gm.png" data-country="Gambia">
                                +220</option>
                            <option value="+221" data-flag="https://flagcdn.com/w20/sn.png" data-country="Senegal">
                                +221</option>
                            <option value="+222" data-flag="https://flagcdn.com/w20/mr.png"
                                data-country="Mauritania">+222</option>
                            <option value="+223" data-flag="https://flagcdn.com/w20/ml.png" data-country="Mali">
                                +223</option>
                            <option value="+224" data-flag="https://flagcdn.com/w20/gn.png" data-country="Guinea">
                                +224</option>
                            <option value="+225" data-flag="https://flagcdn.com/w20/ci.png"
                                data-country="Ivory Coast">+225</option>
                            <option value="+226" data-flag="https://flagcdn.com/w20/bf.png"
                                data-country="Burkina Faso">+226</option>
                            <option value="+227" data-flag="https://flagcdn.com/w20/ne.png" data-country="Niger">
                                +227</option>
                            <option value="+228" data-flag="https://flagcdn.com/w20/tg.png" data-country="Togo">
                                +228</option>
                            <option value="+229" data-flag="https://flagcdn.com/w20/bj.png" data-country="Benin">
                                +229</option>
                            <option value="+230" data-flag="https://flagcdn.com/w20/mu.png"
                                data-country="Mauritius">+230</option>
                            <option value="+231" data-flag="https://flagcdn.com/w20/lr.png" data-country="Liberia">
                                +231</option>
                            <option value="+232" data-flag="https://flagcdn.com/w20/sl.png"
                                data-country="Sierra Leone">+232</option>
                            <option value="+233" data-flag="https://flagcdn.com/w20/gh.png" data-country="Ghana">
                                +233</option>
                            <option value="+234" data-flag="https://flagcdn.com/w20/ng.png" data-country="Nigeria">
                                +234</option>
                            <option value="+235" data-flag="https://flagcdn.com/w20/td.png" data-country="Chad">
                                +235</option>
                            <option value="+236" data-flag="https://flagcdn.com/w20/cf.png"
                                data-country="Central African Republic">+236</option>
                            <option value="+237" data-flag="https://flagcdn.com/w20/cm.png"
                                data-country="Cameroon">+237</option>
                            <option value="+238" data-flag="https://flagcdn.com/w20/cv.png"
                                data-country="Cape Verde">+238</option>
                            <option value="+239" data-flag="https://flagcdn.com/w20/st.png"
                                data-country="Sao Tome and Principe">+239</option>
                            <option value="+240" data-flag="https://flagcdn.com/w20/gq.png"
                                data-country="Equatorial Guinea">+240</option>
                            <option value="+241" data-flag="https://flagcdn.com/w20/ga.png" data-country="Gabon">
                                +241</option>
                            <option value="+242" data-flag="https://flagcdn.com/w20/cg.png" data-country="Congo">
                                +242</option>
                            <option value="+243" data-flag="https://flagcdn.com/w20/cd.png"
                                data-country="Democratic Republic of Congo">+243</option>
                            <option value="+244" data-flag="https://flagcdn.com/w20/ao.png" data-country="Angola">
                                +244</option>
                            <option value="+245" data-flag="https://flagcdn.com/w20/gw.png"
                                data-country="Guinea-Bissau">+245</option>
                            <option value="+248" data-flag="https://flagcdn.com/w20/sc.png"
                                data-country="Seychelles">+248</option>
                            <option value="+249" data-flag="https://flagcdn.com/w20/sd.png" data-country="Sudan">
                                +249</option>
                            <option value="+250" data-flag="https://flagcdn.com/w20/rw.png" data-country="Rwanda">
                                +250</option>
                            <option value="+251" data-flag="https://flagcdn.com/w20/et.png"
                                data-country="Ethiopia">+251</option>
                            <option value="+252" data-flag="https://flagcdn.com/w20/so.png" data-country="Somalia">
                                +252</option>
                            <option value="+253" data-flag="https://flagcdn.com/w20/dj.png"
                                data-country="Djibouti">+253</option>
                            <option value="+254" data-flag="https://flagcdn.com/w20/ke.png" data-country="Kenya">
                                +254</option>
                            <option value="+255" data-flag="https://flagcdn.com/w20/tz.png"
                                data-country="Tanzania">+255</option>
                            <option value="+256" data-flag="https://flagcdn.com/w20/ug.png" data-country="Uganda">
                                +256</option>
                            <option value="+257" data-flag="https://flagcdn.com/w20/bi.png" data-country="Burundi">
                                +257</option>
                            <option value="+258" data-flag="https://flagcdn.com/w20/mz.png"
                                data-country="Mozambique">+258</option>
                            <option value="+260" data-flag="https://flagcdn.com/w20/zm.png" data-country="Zambia">
                                +260</option>
                            <option value="+261" data-flag="https://flagcdn.com/w20/mg.png"
                                data-country="Madagascar">+261</option>
                            <option value="+262" data-flag="https://flagcdn.com/w20/re.png" data-country="Reunion">
                                +262</option>
                            <option value="+263" data-flag="https://flagcdn.com/w20/zw.png"
                                data-country="Zimbabwe">+263</option>
                            <option value="+264" data-flag="https://flagcdn.com/w20/na.png" data-country="Namibia">
                                +264</option>
                            <option value="+265" data-flag="https://flagcdn.com/w20/mw.png" data-country="Malawi">
                                +265</option>
                            <option value="+266" data-flag="https://flagcdn.com/w20/ls.png" data-country="Lesotho">
                                +266</option>
                            <option value="+267" data-flag="https://flagcdn.com/w20/bw.png"
                                data-country="Botswana">+267</option>
                            <option value="+268" data-flag="https://flagcdn.com/w20/sz.png"
                                data-country="Swaziland">+268</option>
                            <option value="+269" data-flag="https://flagcdn.com/w20/km.png" data-country="Comoros">
                                +269</option>
                            <option value="+290" data-flag="https://flagcdn.com/w20/sh.png"
                                data-country="Saint Helena">+290</option>
                            <option value="+291" data-flag="https://flagcdn.com/w20/er.png" data-country="Eritrea">
                                +291</option>
                            <option value="+297" data-flag="https://flagcdn.com/w20/aw.png" data-country="Aruba">
                                +297</option>
                            <option value="+299" data-flag="https://flagcdn.com/w20/gl.png"
                                data-country="Greenland">+299</option>
                            <option value="+350" data-flag="https://flagcdn.com/w20/gi.png"
                                data-country="Gibraltar">+350</option>
                            <option value="+355" data-flag="https://flagcdn.com/w20/al.png" data-country="Albania">
                                +355</option>
                            <option value="+373" data-flag="https://flagcdn.com/w20/md.png" data-country="Moldova">
                                +373</option>
                            <option value="+374" data-flag="https://flagcdn.com/w20/am.png" data-country="Armenia">
                                +374</option>
                            <option value="+375" data-flag="https://flagcdn.com/w20/by.png" data-country="Belarus">
                                +375</option>
                            <option value="+380" data-flag="https://flagcdn.com/w20/ua.png" data-country="Ukraine">
                                +380</option>
                            <option value="+381" data-flag="https://flagcdn.com/w20/rs.png" data-country="Serbia">
                                +381</option>
                            <option value="+382" data-flag="https://flagcdn.com/w20/me.png"
                                data-country="Montenegro">+382</option>
                            <option value="+383" data-flag="https://flagcdn.com/w20/xk.png" data-country="Kosovo">
                                +383</option>
                            <option value="+387" data-flag="https://flagcdn.com/w20/ba.png"
                                data-country="Bosnia and Herzegovina">+387</option>
                            <option value="+389" data-flag="https://flagcdn.com/w20/mk.png"
                                data-country="North Macedonia">+389</option>
                            <option value="+500" data-flag="https://flagcdn.com/w20/fk.png"
                                data-country="Falkland Islands">+500</option>
                            <option value="+501" data-flag="https://flagcdn.com/w20/bz.png" data-country="Belize">
                                +501</option>
                            <option value="+502" data-flag="https://flagcdn.com/w20/gt.png"
                                data-country="Guatemala">+502</option>
                            <option value="+503" data-flag="https://flagcdn.com/w20/sv.png"
                                data-country="El Salvador">+503</option>
                            <option value="+504" data-flag="https://flagcdn.com/w20/hn.png"
                                data-country="Honduras">+504</option>
                            <option value="+505" data-flag="https://flagcdn.com/w20/ni.png"
                                data-country="Nicaragua">+505</option>
                            <option value="+506" data-flag="https://flagcdn.com/w20/cr.png"
                                data-country="Costa Rica">+506</option>
                            <option value="+507" data-flag="https://flagcdn.com/w20/pa.png" data-country="Panama">
                                +507</option>
                            <option value="+508" data-flag="https://flagcdn.com/w20/pm.png"
                                data-country="Saint Pierre and Miquelon">+508</option>
                            <option value="+509" data-flag="https://flagcdn.com/w20/ht.png" data-country="Haiti">
                                +509</option>
                            <option value="+590" data-flag="https://flagcdn.com/w20/gp.png"
                                data-country="Guadeloupe">+590</option>
                            <option value="+591" data-flag="https://flagcdn.com/w20/bo.png" data-country="Bolivia">
                                +591</option>
                            <option value="+592" data-flag="https://flagcdn.com/w20/gy.png" data-country="Guyana">
                                +592</option>
                            <option value="+593" data-flag="https://flagcdn.com/w20/ec.png" data-country="Ecuador">
                                +593</option>
                            <option value="+594" data-flag="https://flagcdn.com/w20/gf.png"
                                data-country="French Guiana">+594</option>
                            <option value="+595" data-flag="https://flagcdn.com/w20/py.png"
                                data-country="Paraguay">+595</option>
                            <option value="+596" data-flag="https://flagcdn.com/w20/mq.png"
                                data-country="Martinique">+596</option>
                            <option value="+597" data-flag="https://flagcdn.com/w20/sr.png"
                                data-country="Suriname">+597</option>
                            <option value="+598" data-flag="https://flagcdn.com/w20/uy.png" data-country="Uruguay">
                                +598</option>
                            <option value="+599" data-flag="https://flagcdn.com/w20/an.png"
                                data-country="Netherlands Antilles">+599</option>
                            <option value="+670" data-flag="https://flagcdn.com/w20/tl.png"
                                data-country="East Timor">+670</option>
                            <option value="+672" data-flag="https://flagcdn.com/w20/aq.png"
                                data-country="Antarctica">+672</option>
                            <option value="+673" data-flag="https://flagcdn.com/w20/bn.png" data-country="Brunei">
                                +673</option>
                            <option value="+674" data-flag="https://flagcdn.com/w20/nr.png" data-country="Nauru">
                                +674</option>
                            <option value="+675" data-flag="https://flagcdn.com/w20/pg.png"
                                data-country="Papua New Guinea">+675</option>
                            <option value="+676" data-flag="https://flagcdn.com/w20/to.png" data-country="Tonga">
                                +676</option>
                            <option value="+677" data-flag="https://flagcdn.com/w20/sb.png"
                                data-country="Solomon Islands">+677</option>
                            <option value="+678" data-flag="https://flagcdn.com/w20/vu.png" data-country="Vanuatu">
                                +678</option>
                            <option value="+679" data-flag="https://flagcdn.com/w20/fj.png" data-country="Fiji">
                                +679</option>
                            <option value="+680" data-flag="https://flagcdn.com/w20/pw.png" data-country="Palau">
                                +680</option>
                            <option value="+681" data-flag="https://flagcdn.com/w20/wf.png"
                                data-country="Wallis and Futuna">+681</option>
                            <option value="+682" data-flag="https://flagcdn.com/w20/ck.png"
                                data-country="Cook Islands">+682</option>
                            <option value="+683" data-flag="https://flagcdn.com/w20/nu.png" data-country="Niue">
                                +683</option>
                            <option value="+684" data-flag="https://flagcdn.com/w20/as.png"
                                data-country="American Samoa">+684</option>
                            <option value="+685" data-flag="https://flagcdn.com/w20/ws.png" data-country="Samoa">
                                +685</option>
                            <option value="+686" data-flag="https://flagcdn.com/w20/ki.png"
                                data-country="Kiribati">+686</option>
                            <option value="+687" data-flag="https://flagcdn.com/w20/nc.png"
                                data-country="New Caledonia">+687</option>
                            <option value="+688" data-flag="https://flagcdn.com/w20/tv.png" data-country="Tuvalu">
                                +688</option>
                            <option value="+689" data-flag="https://flagcdn.com/w20/pf.png"
                                data-country="French Polynesia">+689</option>
                            <option value="+690" data-flag="https://flagcdn.com/w20/tk.png" data-country="Tokelau">
                                +690</option>
                            <option value="+691" data-flag="https://flagcdn.com/w20/fm.png"
                                data-country="Micronesia">+691</option>
                            <option value="+692" data-flag="https://flagcdn.com/w20/mh.png"
                                data-country="Marshall Islands">+692</option>
                            <option value="+850" data-flag="https://flagcdn.com/w20/kp.png"
                                data-country="North Korea">+850</option>
                            <option value="+852" data-flag="https://flagcdn.com/w20/hk.png"
                                data-country="Hong Kong">+852</option>
                            <option value="+853" data-flag="https://flagcdn.com/w20/mo.png" data-country="Macau">
                                +853</option>
                            <option value="+855" data-flag="https://flagcdn.com/w20/kh.png"
                                data-country="Cambodia">+855</option>
                            <option value="+856" data-flag="https://flagcdn.com/w20/la.png" data-country="Laos">
                                +856</option>
                            <option value="+880" data-flag="https://flagcdn.com/w20/bd.png"
                                data-country="Bangladesh">+880</option>
                            <option value="+886" data-flag="https://flagcdn.com/w20/tw.png" data-country="Taiwan">
                                +886</option>
                            <option value="+960" data-flag="https://flagcdn.com/w20/mv.png"
                                data-country="Maldives">+960</option>
                            <option value="+961" data-flag="https://flagcdn.com/w20/lb.png" data-country="Lebanon">
                                +961</option>
                            <option value="+962" data-flag="https://flagcdn.com/w20/jo.png" data-country="Jordan">
                                +962</option>
                            <option value="+963" data-flag="https://flagcdn.com/w20/sy.png" data-country="Syria">
                                +963</option>
                            <option value="+964" data-flag="https://flagcdn.com/w20/iq.png" data-country="Iraq">
                                +964</option>
                            <option value="+967" data-flag="https://flagcdn.com/w20/ye.png" data-country="Yemen">
                                +967</option>
                            <option value="+968" data-flag="https://flagcdn.com/w20/om.png" data-country="Oman">
                                +968</option>
                            <option value="+970" data-flag="https://flagcdn.com/w20/ps.png"
                                data-country="Palestine">+970</option>
                            <option value="+972" data-flag="https://flagcdn.com/w20/il.png" data-country="Israel">
                                +972</option>
                            <option value="+975" data-flag="https://flagcdn.com/w20/bt.png" data-country="Bhutan">
                                +975</option>
                            <option value="+976" data-flag="https://flagcdn.com/w20/mn.png"
                                data-country="Mongolia">+976</option>
                            <option value="+977" data-flag="https://flagcdn.com/w20/np.png" data-country="Nepal">
                                +977</option>
                            <option value="+992" data-flag="https://flagcdn.com/w20/tj.png"
                                data-country="Tajikistan">+992</option>
                            <option value="+993" data-flag="https://flagcdn.com/w20/tm.png"
                                data-country="Turkmenistan">+993</option>
                            <option value="+994" data-flag="https://flagcdn.com/w20/az.png"
                                data-country="Azerbaijan">+994</option>
                            <option value="+995" data-flag="https://flagcdn.com/w20/ge.png" data-country="Georgia">
                                +995</option>
                            <option value="+996" data-flag="https://flagcdn.com/w20/kg.png"
                                data-country="Kyrgyzstan">+996</option>
                            <option value="+998" data-flag="https://flagcdn.com/w20/uz.png"
                                data-country="Uzbekistan">+998</option>
                        </select>
                    </div>
                    <input type="tel" name="phone" placeholder="Phone Number" value="{{ old('phone') }}"
                        required />
                </div>
            </div>
        @else
            <div class="form-group">
                <input type="tel" name="phone" placeholder="Phone Number" value="{{ old('phone') }}"
                    required />
            </div>
        @endif

        <div class="form-group">
            <select name="service" required>
                <option value="">Select Service</option>
                <option value="business-setup" {{ old('service') == 'business-setup' ? 'selected' : '' }}>Business
                    Setup</option>
                <option value="accounting-service" {{ old('service') == 'accounting-service' ? 'selected' : '' }}>
                    Accounting Service</option>
                <option value="auditing-service" {{ old('service') == 'auditing-service' ? 'selected' : '' }}>Auditing
                    Service</option>
                <option value="consultation" {{ old('service') == 'consultation' ? 'selected' : '' }}>Consultation
                </option>
                <option value="free-zone-company" {{ old('service') == 'free-zone-company' ? 'selected' : '' }}>Free
                    Zone Company Setup</option>
                <option value="mainland-company" {{ old('service') == 'mainland-company' ? 'selected' : '' }}>Mainland
                    Company Setup</option>
                <option value="offshore-company" {{ old('service') == 'offshore-company' ? 'selected' : '' }}>Offshore
                    Company Setup</option>
                <option value="visa-services" {{ old('service') == 'visa-services' ? 'selected' : '' }}>Visa Services
                </option>
                <option value="other" {{ old('service') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        @if ($showMessage)
            <div class="form-group">
                <textarea name="message" placeholder="Your Message (Optional)" rows="4">{{ old('message') }}</textarea>
            </div>
        @else
            <input type="hidden" name="message" value="">
        @endif

        @if ($showConsent)
            <div class="consent-wrapper">
                <input type="checkbox" id="{{ $uniqueId }}_consent" name="consent" required />
                <label for="{{ $uniqueId }}_consent">I consent to being contacted by your team via phone, email,
                    etc.</label>
            </div>
        @endif

        <div class="form-group">
            <button type="submit" class="rts-btn btn-primary w-100">
                <i class="fas fa-paper-plane"></i>
                Send Message
            </button>
        </div>

        <div class="form-success" id="{{ $uniqueId }}_successMessage" style="display: none;">
            <i class="fas fa-check-circle"></i>
            Thank you! Your message has been sent successfully. We'll get back to you soon.
        </div>
        <div class="form-error" id="{{ $uniqueId }}_errorMessage" style="display: none;">
            <i class="fas fa-exclamation-circle"></i>
            <span class="error-text">Sorry, there was an error sending your message. Please try again.</span>
        </div>
    </form>
</div>
