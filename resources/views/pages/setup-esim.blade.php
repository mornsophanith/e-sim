@extends('layout.app')
@section('content')
<div class="container setup-esim">
    <div class="header-title breadcrumb">
        <h4 class="title">@lang('index.how_to_setup_eSIM')</h4>
    </div>
    <div class="setup-guide">
        <div class="btn-switch">
            <button type="button" class="btn btn-ios fade-animation active-button" onclick="ontabSetup('ios')" id="btn-ios">
                <img src="/assets/images/victor/ios.png" alt="ios" />
                iOS
            </button>
            <button type="button" class="btn btn-andriod fade-animation" onclick="ontabSetup('andriod')" id="btn-andriod">
                <img src="/assets/images/victor/andriod.png" alt="android" />    
                Android
            </button> 
            
            
            <div class="tab-content" id="ios" style="display:block;">
                <p class="description fade-animation">If you are using iPhone, check the eSIM iPhone list to make sure you can use the eSIM on it, and follow the instructions below for its use. </p>
                <div class="steb-setup">
                    <div class="list">
                        <h4 class="title fade-animation">I. Installation</h4>
                        <ol class="order-list fade-animation">
                            <li class="fade-animation">Turn on Wifi-Connection of your iPhone</li>
                            <li class="fade-animation">One your device, go to Settings. If it isn’t available on your Home screen, swipe left to access the App Library, and  search for it on the search bar.</li>
                            <li class="fade-animation">Tap Cellular or Mobile (depending on your phone)</li>
                            <li class="fade-animation">Tap Add Cellular Plan or Add Mobile Data Plan (depending on your phone)</li>
                            <li class="fade-animation">Scan your printed QR code or the QR code you keep on another device. In case you cannot scan the QR code, you can select Enter Details Manually at bottom of your iPhone screen, and enter the following information:
                                <ul class="unorder-list">
                                    <li class="fade-animation">SM-DP+ Address which looks like RAP-0126.OBARTHOR.NET</li>
                                    <li class="fade-animation">Activation Code which looks like FA9F0-MWFO-M4HOC-BUBGX</li>
                                    <li class="fade-animation">Confirmation Code(optional)</li>
                                </ul>
                            </li>
                            <li class="fade-animation">Tab Add Cellular Plan or Add Mobile Data Plan to confirm the installation.</li>
                            <li class="fade-animation">On the Cellular or Mobile data plan labels screen, choose the available label (such as Secondary, Business, Travel, etc.) or customize label for your eSIM (such as Vietnam eSIM), and then tap Continue</li>
                            <li class="fade-animation">On the iMessage & Facetime page, choose your eSIM.</li>
                            <li class="fade-animation">On the Cellular Data or Mobile Data Plans page, select your eSIM. Remember to turn off the Allow Cellular Data Switching button to avoid expensive roaming charges.</li>
                        </ol>  
                        <p class="sub-title fade-animation">If you do not use the eSIM immediately, just turn it off. And when you need to use it, follow the steps below: </p>
                    </div>
                    <div class="step-image">
                        <img src="/assets/images/step/image 9.png" alt="step" class="fade-animation"/>
                        <img src="/assets/images/step/image 21.png" alt="step" class="fade-animation"/>
                    </div>
                </div>
                <div class="steb-setup">
                    <div class="list">
                        <h4 class="title fade-animation">II. eSIM activation and data use</h4>
                        <ol class="order-list fade-animation">
                            <li class="fade-animation">On your device, go to Settings.</li>
                            <li class="fade-animation">Tap Cellular or Mobile Data (depending on your phone)</li>
                            <li class="fade-animation">Select the eSIM to be used and enable Turn On This Line and Data Roaming.</li>
                            <li class="fade-animation">Go to the Messages, switch your phone number to your eSIM and text as guided to activate the data plan (only applicable to Gigago Vietnam travel eSIM)</li>
                        </ol>
                        <p class="sub-title fade-animation">In case you cannot connect to the internet, please adjust your phone APN (access point name) by:</p>
                        <ol class="order-list fade-animation">
                            <li class="fade-animation">On your device, go to Settings.</li>
                            <li class="fade-animation">Tap Cellular or Mobile (depending on your phone)</li>
                            <li class="fade-animation">Select your eSIM which has enabled Turn On This Line and Data Roaming</li>
                            <li class="fade-animation">Tap Cellular Data Network or Mobile Data Network (depending on your phone)</li>
                            <li class="fade-animation">Enter provided APN on all APN fields (Cellular/Mobile data, and Personal Hotspot) (for eSIM4Tour Cambodia eSIM) or a different value if you use eSIM from another provider, the other fields are left blank.</li>
                        </ol>
                        <p class="sub-title fade-animation">Now, enjoy your internet in Cambodia and discover our amazing places.</p>
                    </div>
                    <div class="step-image">
                        <img src="/assets/images/step/image 22.png" alt="step" class="fade-animation"/>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="android">
                <p class="description fade-animation">Currently, the carrier-unlocked Samsung S20, S21, S22, Note 20, Fold and Z Flip are supporting eSIM technology. You can check if your Samsung phone supports eSIM here, and follow the steps below to use its data on your device.</p>
                <div class="steb-setup">
                    <div class="list">
                        <h4 class="title fade-animation">I. Installation</h4>
                        <ol class="order-list fade-animation">
                            <li class="fade-animation">One your device, go to Settings. </li>
                            <li class="fade-animation">Tap Connections</li>
                            <li class="fade-animation">Choose SIM card manager</li>
                            <li class="fade-animation">Choose Add mobile plan</li>
                            <li class="fade-animation">The searching for plan comes.</li>
                            <li class="fade-animation">If the No Plans found screen appears, tap OK on the popup message, and then tab Scan carrier QR Code.</li>
                            <li class="fade-animation">
                                Position the QR Code within the guided lines to scan it. In case the scanning fails, tab Enter code instead at the bottom of the scree, and enter the activation code provided to you by the eSIM provider which looks like LPA:1$RtP-0026.OBARTHAR.NET$PJ2HV-UABNN-SPKQE-GHKFZ.
                                <div class="noted">
                                    <strong>. Note:</strong> In some cases, you select the Add using QR code option, but you still see the Activation code line on your scanning screen, tab it and then enter the activation code.
                                </div>
                            </li>
                            <li class="fade-animation">Once the eSIM plan has been detected, tap Confirm/Add (depending on your phone)</li>
                            <li class="fade-animation">When your plan has been registered, select OK to turn on the plan (if you are in Vietnam and want to use the plan immediately), or Cancel (if you are not in Vietnam or don’t want to use the data plan immediately).</li>
                        </ol>  
                        <p class="sub-title fade-animation">If you do not use the eSIM immediately, just turn it off. And when you need to use it, follow the steps below: </p>
                    </div>
                    <div class="step-image">
                        <img src="/assets/images/step/image 10.png" alt="step" class="fade-animation"/>
                    </div>
                </div>
                <div class="steb-setup">
                    <div class="list">
                        <h4 class="title fade-animation">II. eSIM activation and data use</h4>
                        <p class="sub-title">When you need to use your travel eSIM, you will need to:</p>
                        <ol class="order-list fade-animation">
                            <li class="fade-animation">Go to Settings >> Connections > SIM card manager, and select your eSIM and turn it on, and select your eSIM as Mobile data.</li>
                            <li class="fade-animation">TaThen get back to Connections > Mobile networks to turn on Data roaming of your phone.</li>
                            <li class="fade-animation">Go to the Messages, switch your phone number to your eSIM and text as guided to activate the data plan (only applicable to Gigago Vietnam travel eSIM)</li>
                        </ol>
                        <p class="sub-title fade-animation">In case you cannot connect to the internet, please adjust your phone APN (access point name) by:</p>
                        <ul class="order-list fade-animation">
                            <li class="fade-animation">Going to Settings >> Connections >> Mobile networks</li>
                            <li class="fade-animation">Tapping Access Point Names >> Tapping Add</li>
                            <li class="fade-animation">Select the APN field and enter the mobile operator’s APN, such as m9-itelecom.</li>
                        </ul>
                        <p class="sub-title fade-animation">That’s all you need for activating your travel eSIM on your Samsung phone.</p>
                    </div>
                    <div class="step-image">
                        <img src="/assets/images/step/image 23.png" alt="step" class="fade-animation"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection