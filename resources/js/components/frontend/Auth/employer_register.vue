<template>
    <main>
        <div class="login-box employer-register-section">
            <div class="login-box-body">
            <header>
                <nav class="navbar navbar-expand-lg fixed-top header-navbar">
                <div class="container">
                <router-link class="navbar-brand headerLogo" to="/">
                    <svg fill="#fff" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 35"><defs></defs><title>Untitled-1</title><path d="M38.1745,8.3927H33.55V21.3481h1.8275V16.743h2.7972a4.1763,4.1763,0,1,0,0-8.35Zm0,6.6056H35.3773V10.1374h2.7972a2.3371,2.3371,0,0,1,2.4464,2.4391A2.329,2.329,0,0,1,38.1745,14.9983Z"/><path d="M48.203,11.7214h-.4487a3.5955,3.5955,0,0,0-2.4814.8569v-.7361H43.498v9.5059h1.7749V16.1122a2.3781,2.3781,0,0,1,2.4814-2.6807h.4487Z"/><path d="M53.0178,11.6524a4.9438,4.9438,0,1,0,5.0458,4.9427A4.9509,4.9509,0,0,0,53.0178,11.6524Zm0,8.1753a3.2326,3.2326,0,1,1,3.2534-3.2326A3.2174,3.2174,0,0,1,53.0178,19.8277Z"/><path d="M62.6012,15.7723c-1.3672-.3441-2.0114-.5777-2.0114-1.23,0-.8152.8321-1.18,1.6568-1.18a1.8549,1.8549,0,0,1,1.83,1.0349l.1925.4685,1.5349-.8623-.164-.364a3.5506,3.5506,0,0,0-3.3931-1.9873c-1.9884,0-3.4316,1.2155-3.4316,2.89,0,2.0022,1.8147,2.4642,3.2729,2.8353,1.389.3536,2.0435.5942,2.0435,1.27,0,1.1232-1.5117,1.18-1.8147,1.18a2.0851,2.0851,0,0,1-2.1534-1.2162l-.1745-.5145-1.559.8911.1331.349a3.75,3.75,0,0,0,3.7538,2.2007c2.1134,0,3.59-1.1884,3.59-2.89C65.9062,16.6043,64.0737,16.143,62.6012,15.7723Z"/><rect x="67.0438" y="7.8752" width="1.7748" height="13.4729"/><rect x="70.623" y="11.8422" width="1.7748" height="9.5059"/><path d="M71.51,8.3927A1.1227,1.1227,0,1,0,72.661,9.5065,1.1339,1.1339,0,0,0,71.51,8.3927Z"/><path d="M79.3006,11.6524A4.6652,4.6652,0,0,0,75.977,12.95V11.8422H74.2022V24.7975H75.977V20.24a4.6647,4.6647,0,0,0,3.3236,1.298,4.943,4.943,0,1,0,0-9.8854Zm-.0526,1.71a3.2328,3.2328,0,1,1-3.271,3.2325A3.2172,3.2172,0,0,1,79.248,13.3626Z"/><path d="M88.8488,15.7723c-1.3671-.3441-2.0113-.5777-2.0113-1.23,0-.8152.8321-1.18,1.6567-1.18a1.8548,1.8548,0,0,1,1.83,1.0348l.1924.4687,1.5349-.8624-.1638-.364a3.5505,3.5505,0,0,0-3.3932-1.9873c-1.9883,0-3.4315,1.2155-3.4315,2.89,0,2.0022,1.8147,2.4642,3.2729,2.8353,1.389.3536,2.0434.5942,2.0434,1.27,0,1.1232-1.5115,1.18-1.8146,1.18a2.0852,2.0852,0,0,1-2.1535-1.2162l-.1745-.5145-1.559.8911.1331.349a3.7508,3.7508,0,0,0,3.7539,2.2007c2.1134,0,3.5895-1.1884,3.5895-2.89C92.1539,16.6043,90.3213,16.143,88.8488,15.7723Z"/><path d="M94.1789,10.6375a1.1227,1.1227,0,1,0-1.1506-1.131A1.1422,1.1422,0,0,0,94.1789,10.6375Z"/><rect x="93.2915" y="11.8422" width="1.7748" height="9.5059"/><path d="M24.94,16.3364l-.0319.0078a6.9469,6.9469,0,0,1-.9234,2.0107,6.7668,6.7668,0,0,0,.9076-1.8529C24.9074,16.455,24.92,16.4073,24.94,16.3364Z"/><path d="M25.0124,11.9986c-.131-.018-.2515-.0417-.3726-.0477-.263-.0132-.5266-.0227-.79-.0227q-4.8263,0-9.6524.0033c-.8406.0006-1.6812.0065-2.5218.01a5.596,5.596,0,0,0-1.2438.1327,6.3294,6.3294,0,0,0-3.2111,1.8262,6.6911,6.6911,0,0,0-1.9035,4.4871c-.0231.5718-.0234,1.1448-.0228,1.7172.0015,1.34.0128,2.6809.0145,4.0214.0012,1.027-.01,2.0539-.0087,3.0809.0009.8723.01,1.7447.0185,2.6171a2.3926,2.3926,0,0,0,.14.7745,2.068,2.068,0,0,0,1.1961,1.3029A2.1315,2.1315,0,0,0,7.78,32.018,1.9212,1.9212,0,0,0,9.21,31.1009a2.3274,2.3274,0,0,0,.2816-.72,4.492,4.492,0,0,0,.0714-.9493q.0174-1.4108.0281-2.8215.0146-1.6084.0271-3.2169c.0086-1.195.0122-2.39.0238-3.5851.004-.4086.017-.8176.0421-1.2254a2.9669,2.9669,0,0,1,.2122-.9395,1.62,1.62,0,0,1,.9133-.9231,3.0293,3.0293,0,0,1,.7364-.19,7.183,7.183,0,0,1,1.02-.0562q5.8079-.0009,11.6156-.0022a3.6813,3.6813,0,0,0,.7848-.0791c.0617-.0134.124-.0293.2025-.0484A7.6179,7.6179,0,0,0,25.0124,11.9986Z"/><g class="cls-1"><image width="311" height="319" transform="translate(-11.52 -24) scale(0.24)" xlink:href="data:image/png;base64,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"/></g><path d="M29.4261,12.7875a13.4883,13.4883,0,0,0-1.08-3.6025,9.9948,9.9948,0,0,0-2.9275-3.7787A11.1084,11.1084,0,0,0,18.6522,2.985c-.8722-.0166-1.7447-.02-2.6171-.0243q-1.4382-.0075-2.8765-.0059-2.488.0006-4.9761.0054c-.3272.0005-.6546-.0044-.9814.0079a5.2152,5.2152,0,0,0-.704.0678,1.9839,1.9839,0,0,0-1.4091.9329,3.493,3.493,0,0,0-.1963.358,2.1619,2.1619,0,0,0-.0493,1.7973A2.16,2.16,0,0,0,6.357,7.4955a3.5676,3.5676,0,0,0,.8927.0869q2.8562.0029,5.7123.0047c1.9314.0012,3.8628-.0011,5.7941.0052a6.9971,6.9971,0,0,1,.951.063,5.9614,5.9614,0,0,1,2.0054.67,6.2364,6.2364,0,0,1,2.66,2.7266c-.0221-.044-.0348-.067-.0348-.067s.0127.023.0348.067a7.5645,7.5645,0,0,1,.3714.8634c.0086.024.013.0494.0223.0852l-.0134-.0019a7.62,7.62,0,0,1,.1558,4.3456l.0319-.0078c-.02.0709-.0328.1186-.0477.1656a6.7668,6.7668,0,0,1-.9076,1.8529v0a6.7479,6.7479,0,0,1-1.8841,1.793,6.2344,6.2344,0,0,1-3.2354,1.0159c-.3949.013-.7906.0065-1.1859.0068-.9634.0007-1.9268-.0022-2.89.0023a3.7576,3.7576,0,0,0-.624.0442A2.2465,2.2465,0,0,0,12.6627,24.68a2.1887,2.1887,0,0,0,1.9079,1.0044c1.2131.014,2.4266.0076,3.64.0072.5224,0,1.0447.0006,1.5661-.0482a9.6221,9.6221,0,0,0,2.6306-.6161,10.8659,10.8659,0,0,0,4.529-3.3289,11.4575,11.4575,0,0,0,2.5592-6.22A10.6438,10.6438,0,0,0,29.4261,12.7875Z"/></svg>
                </router-link>

                </div>
            </nav>
            </header>
            <div class="row no-gutters mt-60">
              <div class="col-md-6">
               <div class="about-img">
                <svg version="1.1" id="searching" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 800 600" enable-background="new 0 0 800 600" xml:space="preserve">
                    <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="272.0428" y1="379.3983" x2="549.887" y2="101.554">
                        <stop  offset="0" style="stop-color:#FFFFED"/>
                        <stop  offset="0.3317" style="stop-color:#F6F6E8"/>
                        <stop  offset="0.8711" style="stop-color:#DEDEDB"/>
                        <stop  offset="1" style="stop-color:#D7D7D7"/>
                    </linearGradient>
                    <circle fill="url(#SVGID_1_)" cx="407.441" cy="244" r="170"/>
                    <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="233.441" y1="210" x2="233.441" y2="364.5477">
                        <stop  offset="0" style="stop-color:#EBEBEB"/>
                        <stop  offset="0.3124" style="stop-color:#E7E7E7"/>
                        <stop  offset="0.6359" style="stop-color:#DADADA"/>
                        <stop  offset="0.9636" style="stop-color:#C6C6C6"/>
                        <stop  offset="1" style="stop-color:#C3C3C3"/>
                    </linearGradient>
                    <path fill="url(#SVGID_2_)" d="M355.441,358c0,2.209-1.791,4-4,4h-236c-2.209,0-4-1.791-4-4V180c0-2.209,1.791-4,4-4h236
                        c2.209,0,4,1.791,4,4V358z"/>
                    <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="192.4411" y1="166" x2="227.1444" y2="166">
                        <stop  offset="0" style="stop-color:#6362BB"/>
                        <stop  offset="1" style="stop-color:#512CB8"/>
                    </linearGradient>
                    <path fill="url(#SVGID_3_)" d="M214.009,156h-45.138c-3.28,0-6.229,1.997-7.447,5.042L155.441,176h72l-5.983-14.956
                        C220.24,157.997,217.29,156,214.009,156z"/>
                    <linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="111.441" y1="176" x2="355.441" y2="176">
                        <stop  offset="0" style="stop-color:#7B97E2"/>
                        <stop  offset="1" style="stop-color:#7B1AE2"/>
                    </linearGradient>
                    <path fill="url(#SVGID_4_)" d="M203.435,170.985l-3.95-9.875c-1.235-3.087-4.224-5.111-7.549-5.111h-44.991
                        c-3.325,0-6.314,2.024-7.549,5.111l-4.949,12.372c-0.608,1.52-2.081,2.517-3.718,2.517h-15.289c-2.209,0-4,1.791-4,4v16h244v-16
                        c0-2.209-1.791-4-4-4H210.842C207.58,176,204.647,174.014,203.435,170.985z"/>
                    <linearGradient id="SVGID_5_" gradientUnits="userSpaceOnUse" x1="149.441" y1="170" x2="189.441" y2="170">
                        <stop  offset="0" style="stop-color:#6362BB"/>
                        <stop  offset="1" style="stop-color:#512CB8"/>
                    </linearGradient>
                    <path fill="url(#SVGID_5_)" d="M189.441,170c0,1.105-0.895,2-2,2h-36c-1.105,0-2-0.895-2-2l0,0c0-1.105,0.895-2,2-2h36
                        C188.546,168,189.441,168.895,189.441,170L189.441,170z"/>
                    <linearGradient id="SVGID_6_" gradientUnits="userSpaceOnUse" x1="114.7744" y1="279" x2="352.1835" y2="279">
                        <stop  offset="0" style="stop-color:#FFFFF0"/>
                        <stop  offset="0.4619" style="stop-color:#F9F9EF"/>
                        <stop  offset="1" style="stop-color:#EBEBEB"/>
                    </linearGradient>
                    <path fill="url(#SVGID_6_)" d="M347.441,352c0,1.105-0.895,2-2,2h-224c-1.105,0-2-0.895-2-2V206c0-1.105,0.895-2,2-2h224
                        c1.105,0,2,0.895,2,2V352z"/>
                    <linearGradient id="SVGID_7_" gradientUnits="userSpaceOnUse" x1="173.4411" y1="240.5" x2="173.4411" y2="275.5143">
                        <stop  offset="0" style="stop-color:#EBEBEB"/>
                        <stop  offset="0.3124" style="stop-color:#E7E7E7"/>
                        <stop  offset="0.6359" style="stop-color:#DADADA"/>
                        <stop  offset="0.9636" style="stop-color:#C6C6C6"/>
                        <stop  offset="1" style="stop-color:#C3C3C3"/>
                    </linearGradient>
                    <circle fill="url(#SVGID_7_)" cx="173.441" cy="258" r="16"/>
                    <path fill="#5C5D60" d="M191.441,286c0,1.105-0.895,2-2,2h-32c-1.105,0-2-0.895-2-2l0,0c0-1.105,0.895-2,2-2h32
                        C190.546,284,191.441,284.895,191.441,286L191.441,286z"/>
                    <path fill="#5C5D60" d="M185.441,296c0,1.105-0.895,2-2,2h-20c-1.105,0-2-0.895-2-2l0,0c0-1.105,0.895-2,2-2h20
                        C184.546,294,185.441,294.895,185.441,296L185.441,296z"/>
                    <linearGradient id="SVGID_8_" gradientUnits="userSpaceOnUse" x1="233.4411" y1="241.5" x2="233.4411" y2="274.6671">
                        <stop  offset="0" style="stop-color:#EBEBEB"/>
                        <stop  offset="0.3124" style="stop-color:#E7E7E7"/>
                        <stop  offset="0.6359" style="stop-color:#DADADA"/>
                        <stop  offset="0.9636" style="stop-color:#C6C6C6"/>
                        <stop  offset="1" style="stop-color:#C3C3C3"/>
                    </linearGradient>
                    <circle fill="url(#SVGID_8_)" cx="233.441" cy="258" r="16"/>
                    <path fill="#5C5D60" d="M251.441,286c0,1.105-0.895,2-2,2h-32c-1.105,0-2-0.895-2-2l0,0c0-1.105,0.895-2,2-2h32
                        C250.546,284,251.441,284.895,251.441,286L251.441,286z"/>
                    <path fill="#5C5D60" d="M245.441,296c0,1.105-0.895,2-2,2h-20c-1.105,0-2-0.895-2-2l0,0c0-1.105,0.895-2,2-2h20
                        C244.546,294,245.441,294.895,245.441,296L245.441,296z"/>
                    <linearGradient id="SVGID_9_" gradientUnits="userSpaceOnUse" x1="355.441" y1="392.75" x2="355.441" y2="404.7414">
                        <stop  offset="0" style="stop-color:#282828"/>
                        <stop  offset="1" style="stop-color:#383838"/>
                    </linearGradient>
                    <rect x="319.441" y="394" fill="url(#SVGID_9_)" width="72" height="10"/>
                    <linearGradient id="SVGID_10_" gradientUnits="userSpaceOnUse" x1="293.4412" y1="241.5" x2="293.4412" y2="274.1773">
                        <stop  offset="0" style="stop-color:#EBEBEB"/>
                        <stop  offset="0.3124" style="stop-color:#E7E7E7"/>
                        <stop  offset="0.6359" style="stop-color:#DADADA"/>
                        <stop  offset="0.9636" style="stop-color:#C6C6C6"/>
                        <stop  offset="1" style="stop-color:#C3C3C3"/>
                    </linearGradient>
                    <circle fill="url(#SVGID_10_)" cx="293.441" cy="258" r="16"/>
                    <linearGradient id="SVGID_11_" gradientUnits="userSpaceOnUse" x1="213.441" y1="318" x2="257.441" y2="318">
                        <stop  offset="0" style="stop-color:#FFCF5C"/>
                        <stop  offset="1" style="stop-color:#FF9617"/>
                    </linearGradient>
                    <path fill="url(#SVGID_11_)" d="M257.441,318c0,2.209-1.791,4-4,4h-36c-2.209,0-4-1.791-4-4l0,0c0-2.209,1.791-4,4-4h36
                        C255.65,314,257.441,315.791,257.441,318L257.441,318z"/>
                    <linearGradient id="SVGID_12_" gradientUnits="userSpaceOnUse" x1="470.0843" y1="468" x2="640.8523" y2="468">
                        <stop  offset="0" style="stop-color:#DDDDDD"/>
                        <stop  offset="0.1496" style="stop-color:#CFCFCF"/>
                        <stop  offset="0.4388" style="stop-color:#BBBBBB"/>
                        <stop  offset="0.7244" style="stop-color:#AEAEAE"/>
                        <stop  offset="1" style="stop-color:#AAAAAA"/>
                    </linearGradient>
                    <path fill="url(#SVGID_12_)" d="M633.441,472h-156c-2.209,0-4-1.791-4-4v-4h164v4C637.441,470.209,635.65,472,633.441,472z"/>
                    <linearGradient id="SVGID_13_" gradientUnits="userSpaceOnUse" x1="555.441" y1="373.7436" x2="555.441" y2="467.629">
                        <stop  offset="0" style="stop-color:#7BA1E2"/>
                        <stop  offset="1" style="stop-color:#7B1AE2"/>
                    </linearGradient>
                    <path fill="url(#SVGID_13_)" d="M621.441,376h-132c-2.209,0-4,1.791-4,4v84h140v-84C625.441,377.791,623.65,376,621.441,376z"/>
                    <linearGradient id="SVGID_14_" gradientUnits="userSpaceOnUse" x1="493.441" y1="420" x2="617.441" y2="420">
                        <stop  offset="0" style="stop-color:#FFFFF0"/>
                        <stop  offset="0.4619" style="stop-color:#F9F9EF"/>
                        <stop  offset="1" style="stop-color:#EBEBEB"/>
                    </linearGradient>
                    <rect x="493.441" y="384" fill="url(#SVGID_14_)" width="124" height="72"/>
                    <linearGradient id="SVGID_15_" gradientUnits="userSpaceOnUse" x1="281.5463" y1="476" x2="117.9287" y2="476">
                        <stop  offset="0" style="stop-color:#F5F5F5"/>
                        <stop  offset="1" style="stop-color:#DDDDDD"/>
                    </linearGradient>
                    <rect x="119.441" y="472" fill="url(#SVGID_15_)" width="160" height="8"/>
                    <linearGradient id="SVGID_16_" gradientUnits="userSpaceOnUse" x1="431.441" y1="476" x2="667.441" y2="476">
                        <stop  offset="0" style="stop-color:#F5F5F5"/>
                        <stop  offset="1" style="stop-color:#DDDDDD"/>
                    </linearGradient>
                    <rect x="431.441" y="472" fill="url(#SVGID_16_)" width="236" height="8"/>
                    <linearGradient id="SVGID_17_" gradientUnits="userSpaceOnUse" x1="183.441" y1="435" x2="247.441" y2="435">
                        <stop  offset="0" style="stop-color:#FFE552"/>
                        <stop  offset="1" style="stop-color:#FF9617"/>
                    </linearGradient>
                    <path fill="url(#SVGID_17_)" d="M247.441,468c0,2.209-1.791,4-4,4h-56c-2.209,0-4-1.791-4-4v-66c0-2.209,1.791-4,4-4h56
                        c2.209,0,4,1.791,4,4V468z"/>
                    <linearGradient id="SVGID_18_" gradientUnits="userSpaceOnUse" x1="155.4411" y1="436" x2="183.441" y2="436">
                        <stop  offset="0" style="stop-color:#FFE552"/>
                        <stop  offset="1" style="stop-color:#FFAE39"/>
                    </linearGradient>
                    <path fill="url(#SVGID_18_)" d="M183.441,460h-4c-13.233,0-24-10.766-24-24s10.767-24,24-24h4v8h-4c-8.822,0-16,7.178-16,16
                        s7.178,16,16,16h4V460z"/>
                    <linearGradient id="SVGID_19_" gradientUnits="userSpaceOnUse" x1="207.441" y1="394.2273" x2="207.441" y2="414.5528">
                        <stop  offset="0" style="stop-color:#BE7A5C"/>
                        <stop  offset="1" style="stop-color:#996D5C"/>
                    </linearGradient>
                    <path fill="url(#SVGID_19_)" d="M221.441,398v11.72c0,2.62-1.9,5-4.5,5.26c-2.98,0.28-5.46-2.02-5.5-4.92
                        c-0.02-1.98-1.5-3.76-3.46-4.02c-2.44-0.34-4.54,1.58-4.54,3.96v5c0,2.76-2.24,5-5,5c-1.38,0-2.64-0.56-3.54-1.46
                        c-0.9-0.9-1.46-2.16-1.46-3.54v-17c0-1.1,0.9-2,2-2h24C220.541,396,221.441,396.9,221.441,398z"/>
                    <linearGradient id="SVGID_20_" gradientUnits="userSpaceOnUse" x1="586.3881" y1="160.9598" x2="586.3881" y2="296.7917">
                        <stop  offset="0" style="stop-color:#FFFFED"/>
                        <stop  offset="1" style="stop-color:#EBEBEB"/>
                    </linearGradient>
                    <path fill="url(#SVGID_20_)" d="M688.733,225.515c1.258,2.17,1.258,4.806,0,6.976c-20.606,35.532-67.955,59.515-101.859,59.515
                        c-35.002,0-84.334-25.561-103.775-63.003C502.54,191.561,551.873,166,586.874,166C620.778,166,668.127,189.982,688.733,225.515z"/>
                    <path opacity="0.07" fill="#262626" d="M612.355,234.043c0,15.47-12.53,28.001-28.001,28.001s-28.001-12.531-28.001-28.001
                        c0-15.471,12.53-28.001,28.001-28.001c2.87,0,5.6,0.42,8.26,1.26c-0.84,1.75-1.26,3.71-1.26,5.74c0,7.7,6.3,14.001,14.001,14.001
                        c2.03,0,3.99-0.42,5.74-1.26C611.935,228.443,612.355,231.173,612.355,234.043z"/>
                    <linearGradient id="SVGID_21_" gradientUnits="userSpaceOnUse" x1="584.3542" y1="200.6516" x2="584.3542" y2="254.6304">
                        <stop  offset="0" style="stop-color:#353535"/>
                        <stop  offset="1" style="stop-color:#797979"/>
                    </linearGradient>
                    <path fill="url(#SVGID_21_)" d="M612.355,229.003c0,15.47-12.53,28.001-28.001,28.001s-28.001-12.531-28.001-28.001
                        c0-15.471,12.53-28.001,28.001-28.001c2.87,0,5.6,0.42,8.26,1.26c-0.84,1.75-1.26,3.71-1.26,5.74c0,7.7,6.3,14.001,14.001,14.001
                        c2.03,0,3.99-0.42,5.74-1.26C611.935,223.403,612.355,226.133,612.355,229.003z"/>
                    <path opacity="0.3" d="M592.626,202.265c-0.706,1.436-1.109,3.049-1.21,4.713c-2.293-0.63-4.612-0.932-7.056-0.932
                        c-14.617,0-26.612,11.189-27.872,25.478c-0.101-0.832-0.126-1.663-0.126-2.52c0-15.474,12.525-27.998,27.998-27.998
                        C587.233,201.004,589.955,201.433,592.626,202.265z"/>
                    <linearGradient id="SVGID_22_" gradientUnits="userSpaceOnUse" x1="243.441" y1="474.0555" x2="243.441" y2="397.4822">
                        <stop  offset="0" style="stop-color:#302926;stop-opacity:0"/>
                        <stop  offset="1" style="stop-color:#000000;stop-opacity:0.15"/>
                    </linearGradient>
                    <path fill="url(#SVGID_22_)" d="M247.441,468c0,2.209-1.791,4-4,4l0,0c-2.209,0-4-1.791-4-4v-70c0,0,1.792,0,4.001,0h-0.001
                        c2.209,0,4,1.791,4,4V468z"/>
                    <path opacity="0.1" fill="#3D3630" d="M203.441,415v2c0,2.76-2.24,5-5,5c-1.38,0-2.64-0.56-3.54-1.46c-0.9-0.9-1.46-2.16-1.46-3.54
                        v-2c0,1.38,0.56,2.64,1.46,3.54c0.9,0.9,2.16,1.46,3.54,1.46C201.201,420,203.441,417.76,203.441,415z"/>
                    <path opacity="0.1" fill="#3D3630" d="M221.441,409.72v2c0,2.62-1.9,5-4.5,5.26c-2.98,0.28-5.46-2.02-5.5-4.92
                        c-0.02-1.98-1.5-3.76-3.46-4.02c-2.44-0.34-4.54,1.58-4.54,3.96v-2c0-2.38,2.1-4.3,4.54-3.96c1.96,0.26,3.44,2.04,3.46,4.02
                        c0.04,2.9,2.52,5.2,5.5,4.92C219.541,414.72,221.441,412.34,221.441,409.72z"/>
                    <linearGradient id="SVGID_23_" gradientUnits="userSpaceOnUse" x1="593.441" y1="415.68" x2="593.441" y2="424.3039">
                        <stop  offset="0" style="stop-color:#FFCF5C"/>
                        <stop  offset="1" style="stop-color:#FF9617"/>
                    </linearGradient>
                    <path fill="url(#SVGID_23_)" d="M599.441,424h-16v-8h16c2.209,0,4,1.791,4,4l0,0C603.441,422.209,601.65,424,599.441,424z"/>
                    <linearGradient id="SVGID_24_" gradientUnits="userSpaceOnUse" x1="508.1911" y1="420" x2="583.1927" y2="420">
                        <stop  offset="0" style="stop-color:#F5F5F5"/>
                        <stop  offset="1" style="stop-color:#DDDDDD"/>
                    </linearGradient>
                    <path fill="url(#SVGID_24_)" d="M511.441,424h72v-8h-72c-2.209,0-4,1.791-4,4l0,0C507.441,422.209,509.232,424,511.441,424z"/>
                    <path opacity="0.05" fill="#FFFFFF" d="M415.441,332v2h8.421c3.921,0,7.158,2.895,7.763,6.632c0.105-0.421,0.132-0.579,0.132-1.026
                        c0-4.368-3.526-7.605-7.895-7.605H415.441z"/>
                    <linearGradient id="SVGID_25_" gradientUnits="userSpaceOnUse" x1="355.441" y1="403.1528" x2="355.441" y2="526.42">
                        <stop  offset="0" style="stop-color:#5C5F63"/>
                        <stop  offset="0.2615" style="stop-color:#5F6165"/>
                        <stop  offset="0.4187" style="stop-color:#676A6D"/>
                        <stop  offset="0.5485" style="stop-color:#75787B"/>
                        <stop  offset="0.6631" style="stop-color:#8A8C8F"/>
                        <stop  offset="0.768" style="stop-color:#A4A5A8"/>
                        <stop  offset="0.8656" style="stop-color:#C4C5C7"/>
                        <stop  offset="0.9558" style="stop-color:#EAEAEB"/>
                        <stop  offset="1" style="stop-color:#FFFFFF"/>
                    </linearGradient>
                    <path fill="url(#SVGID_25_)" d="M427.441,526h-144v-98c0-13.255,10.745-24,24-24h96c13.255,0,24,10.745,24,24V526z"/>
                    <linearGradient id="SVGID_26_" gradientUnits="userSpaceOnUse" x1="355.4411" y1="402.5" x2="355.4411" y2="463.5082">
                        <stop  offset="0" style="stop-color:#FFFFED"/>
                        <stop  offset="0.4462" style="stop-color:#FBFBED"/>
                        <stop  offset="0.9077" style="stop-color:#EEEEEB"/>
                        <stop  offset="1" style="stop-color:#EBEBEB"/>
                    </linearGradient>
                    <polygon fill="url(#SVGID_26_)" points="387.441,404 355.441,468 323.441,404 "/>
                    <linearGradient id="SVGID_27_" gradientUnits="userSpaceOnUse" x1="283.4412" y1="358" x2="307.4412" y2="358">
                        <stop  offset="0" style="stop-color:#705340"/>
                        <stop  offset="1" style="stop-color:#93614C"/>
                    </linearGradient>
                    <circle fill="url(#SVGID_27_)" cx="295.441" cy="358" r="12"/>
                    <linearGradient id="SVGID_28_" gradientUnits="userSpaceOnUse" x1="355.4411" y1="388.5" x2="355.4411" y2="412.5052">
                        <stop  offset="0" style="stop-color:#F9D6BD"/>
                        <stop  offset="1" style="stop-color:#F9CEB2"/>
                    </linearGradient>
                    <path fill="url(#SVGID_28_)" d="M373.441,404v-24h-36v24h-6l3.593,4.79c1.516,2.021,3.894,3.21,6.42,3.21h27.975
                        c2.526,0,4.904-1.189,6.42-3.21l3.592-4.79H373.441z"/>
                    <linearGradient id="SVGID_29_" gradientUnits="userSpaceOnUse" x1="287.4412" y1="317.75" x2="287.4412" y2="350.8644">
                        <stop  offset="0" style="stop-color:#F9CDAF"/>
                        <stop  offset="0.5359" style="stop-color:#F8CAAB"/>
                        <stop  offset="1" style="stop-color:#F7C4A1"/>
                    </linearGradient>
                    <circle fill="url(#SVGID_29_)" cx="287.441" cy="334" r="16"/>
                    <linearGradient id="SVGID_30_" gradientUnits="userSpaceOnUse" x1="288.4411" y1="325" x2="288.4411" y2="343">
                        <stop  offset="0" style="stop-color:#EFBC9A"/>
                        <stop  offset="0.7147" style="stop-color:#F3C09E"/>
                        <stop  offset="1" style="stop-color:#F7C4A1"/>
                    </linearGradient>
                    <path fill="url(#SVGID_30_)" d="M287.441,326c-4.678,0-8.417,4.014-7.962,8.786c0.397,4.159,4.128,7.214,8.306,7.214h0
                        c5.333,0,9.656-4.323,9.656-9.656V326H287.441z"/>
                    <linearGradient id="SVGID_31_" gradientUnits="userSpaceOnUse" x1="295.441" y1="344" x2="415.441" y2="344">
                        <stop  offset="0" style="stop-color:#FFDEC7"/>
                        <stop  offset="1" style="stop-color:#FFD8BD"/>
                    </linearGradient>
                    <path fill="url(#SVGID_31_)" d="M415.441,336c0,33.137-26.863,60-60,60s-60-26.863-60-60v-44h120V336z"/>
                    <circle fill="#FFFFFF" cx="331.441" cy="326" r="10"/>
                    <linearGradient id="SVGID_32_" gradientUnits="userSpaceOnUse" x1="355.4412" y1="348.25" x2="355.4412" y2="374.5107">
                        <stop  offset="0" style="stop-color:#F9808F"/>
                        <stop  offset="0.391" style="stop-color:#F97792"/>
                        <stop  offset="1" style="stop-color:#F96099"/>
                    </linearGradient>
                    <path fill="url(#SVGID_32_)" d="M379.441,350c0,8.9-4.84,16.66-12,20.8c-3.52,2.04-7.62,3.2-12,3.2s-8.48-1.16-12-3.2
                        c-7.16-4.14-12-11.9-12-20.8c0-1.1,0.9-2,2-2h44C378.541,348,379.441,348.9,379.441,350z"/>
                    <linearGradient id="SVGID_33_" gradientUnits="userSpaceOnUse" x1="355.4412" y1="366" x2="355.4412" y2="374.1508">
                        <stop  offset="0" style="stop-color:#EA5770"/>
                        <stop  offset="0.5523" style="stop-color:#EA4F79"/>
                        <stop  offset="1" style="stop-color:#EA4684"/>
                    </linearGradient>
                    <path fill="url(#SVGID_33_)" d="M367.441,370.8c-3.52,2.04-7.62,3.2-12,3.2s-8.48-1.16-12-3.2c2.44-4.08,6.9-4.8,12-4.8
                        S365.001,366.72,367.441,370.8z"/>
                    <path fill="#FFFFFF" d="M379.441,350c0,1.36-0.12,2.7-0.34,4h-47.32c-0.22-1.3-0.34-2.64-0.34-4c0-1.1,0.9-2,2-2h44
                        C378.541,348,379.441,348.9,379.441,350z"/>
                    <linearGradient id="SVGID_34_" gradientUnits="userSpaceOnUse" x1="331.4413" y1="321.375" x2="331.4413" y2="330">
                        <stop  offset="0" style="stop-color:#4C4B4B"/>
                        <stop  offset="1" style="stop-color:#3A3838"/>
                    </linearGradient>
                    <path fill="url(#SVGID_34_)" d="M335.441,325.82V326c0,2.2-1.8,4-4,4s-4-1.8-4-4c0-2.2,1.8-4,4-4h0.18c-0.12,0.32-0.18,0.64-0.18,1
                        c0,1.66,1.34,3,3,3C334.801,326,335.441,325.94,335.441,325.82z"/>
                    <linearGradient id="SVGID_35_" gradientUnits="userSpaceOnUse" x1="247.4411" y1="286" x2="407.441" y2="286">
                        <stop  offset="0" style="stop-color:#6D6B84"/>
                        <stop  offset="1" style="stop-color:#342847"/>
                    </linearGradient>
                    <path fill="url(#SVGID_35_)" d="M407.441,292h-154c-3.314,0-6-2.686-6-6v0c0-3.314,2.686-6,6-6h154V292z"/>
                    <linearGradient id="SVGID_36_" gradientUnits="userSpaceOnUse" x1="287.441" y1="247" x2="423.441" y2="247">
                        <stop  offset="0" style="stop-color:#6D6B84"/>
                        <stop  offset="1" style="stop-color:#342847"/>
                    </linearGradient>
                    <path fill="url(#SVGID_36_)" d="M287.441,280v-6.526c0-2.299,0.395-4.58,1.168-6.745l15.019-42.053
                        c2.287-6.402,8.351-10.676,15.15-10.676h0c4.266,0,8.358,1.695,11.375,4.712l10.032,10.032c8.244,8.244,21.752,7.763,29.388-1.048
                        l7.058-8.144c3.056-3.526,7.491-5.551,12.157-5.551h0.047c6.435,0,12.251,3.835,14.786,9.75l18.2,42.467
                        c1.07,2.496,1.621,5.184,1.621,7.899V280H287.441z"/>
                    <linearGradient id="SVGID_37_" gradientUnits="userSpaceOnUse" x1="280.191" y1="275" x2="380.6851" y2="275">
                        <stop  offset="0" style="stop-color:#61B4D8"/>
                        <stop  offset="0.2366" style="stop-color:#61A9D8"/>
                        <stop  offset="0.6248" style="stop-color:#619CD8"/>
                        <stop  offset="1" style="stop-color:#6198D8"/>
                    </linearGradient>
                    <path fill="url(#SVGID_37_)" d="M427.441,280h-144v-8c0-1.105,0.896-2,2-2h142V280z"/>
                    <linearGradient id="SVGID_38_" gradientUnits="userSpaceOnUse" x1="441.6531" y1="330.2881" x2="461.1531" y2="349.7881">
                        <stop  offset="0" style="stop-color:#7B1AE2"/>
                        <stop  offset="0.1291" style="stop-color:#9248E1"/>
                        <stop  offset="0.2767" style="stop-color:#A975E0"/>
                        <stop  offset="0.4253" style="stop-color:#BC9BDF"/>
                        <stop  offset="0.5726" style="stop-color:#CAB8DE"/>
                        <stop  offset="0.7184" style="stop-color:#D5CCDD"/>
                        <stop  offset="0.8617" style="stop-color:#DBD9DD"/>
                        <stop  offset="1" style="stop-color:#DDDDDD"/>
                    </linearGradient>
                    <polygon fill="url(#SVGID_38_)" points="458.111,352.402 440.617,334.908 446.273,329.252 463.767,346.746 "/>
                    <linearGradient id="SVGID_39_" gradientUnits="userSpaceOnUse" x1="350.3696" y1="275" x2="374.2328" y2="275">
                        <stop  offset="0" style="stop-color:#302926;stop-opacity:0"/>
                        <stop  offset="0.2682" style="stop-color:#2A2421;stop-opacity:0.0804"/>
                        <stop  offset="0.6189" style="stop-color:#1A1614;stop-opacity:0.1857"/>
                        <stop  offset="1" style="stop-color:#000000;stop-opacity:0.3"/>
                    </linearGradient>
                    <rect x="351.441" y="270" fill="url(#SVGID_39_)" width="20" height="10"/>
                    <linearGradient id="SVGID_40_" gradientUnits="userSpaceOnUse" x1="411.4412" y1="248" x2="411.4412" y2="349.789">
                        <stop  offset="0" style="stop-color:#7B97E2"/>
                        <stop  offset="1" style="stop-color:#7B1AE2"/>
                    </linearGradient>
                    <path fill="url(#SVGID_40_)" d="M411.441,350c-27.57,0-50-22.43-50-50s22.43-50,50-50s50,22.43,50,50S439.011,350,411.441,350z
                        M411.441,258c-23.159,0-42,18.841-42,42c0,23.158,18.841,42,42,42c23.158,0,42-18.842,42-42
                        C453.441,276.841,434.599,258,411.441,258z"/>
                    <circle fill="#FFFFFF" cx="411.441" cy="300" r="42"/>
                    <linearGradient id="SVGID_41_" gradientUnits="userSpaceOnUse" x1="457.8194" y1="346.4551" x2="495.7567" y2="384.3923">
                        <stop  offset="0" style="stop-color:#F2F2F2"/>
                        <stop  offset="0.2266" style="stop-color:#E4E4E4"/>
                        <stop  offset="0.7054" style="stop-color:#CCCCCC"/>
                        <stop  offset="1" style="stop-color:#C3C3C3"/>
                    </linearGradient>
                    <path fill="url(#SVGID_41_)" d="M499.245,372.262c-0.189-4.187-2.149-8.143-5.366-10.814l-24.69-20.574
                        c-1.608-1.34-3.973-1.233-5.453,0.247l-11.252,11.252c-1.48,1.48-1.587,3.845-0.247,5.453l20.574,24.691
                        c0.29,0.345,0.591,0.677,0.907,0.993c2.627,2.627,6.171,4.204,9.908,4.372c4.189,0.189,8.291-1.402,11.254-4.366
                        S499.435,376.451,499.245,372.262z"/>
                    <linearGradient id="SVGID_42_" gradientUnits="userSpaceOnUse" x1="457.9644" y1="348.9767" x2="493.3661" y2="384.3784">
                        <stop  offset="0" style="stop-color:#302926;stop-opacity:0"/>
                        <stop  offset="0.2844" style="stop-color:#2C2523;stop-opacity:0.0427"/>
                        <stop  offset="0.579" style="stop-color:#1F1B19;stop-opacity:0.0868"/>
                        <stop  offset="0.8773" style="stop-color:#0B0909;stop-opacity:0.1316"/>
                        <stop  offset="1" style="stop-color:#000000;stop-opacity:0.15"/>
                    </linearGradient>
                    <path fill="url(#SVGID_42_)" d="M494.88,383.516c-2.97,2.97-7.071,4.554-11.257,4.356c-3.734-0.17-7.283-1.739-9.9-4.356
                        c-0.325-0.325-0.622-0.651-0.919-1.004l-20.563-24.692c-1.344-1.598-1.23-3.974,0.24-5.445l0.707-0.707l20.351,24.452
                        c0.297,0.354,0.594,0.679,0.919,1.004c2.616,2.616,6.166,4.186,9.899,4.356c4.186,0.198,8.287-1.386,11.257-4.356
                        c1.626-1.626,2.828-3.592,3.55-5.728c0.028,0.283,0.057,0.566,0.071,0.863C499.433,376.445,497.85,380.546,494.88,383.516z"/>
                    <path fill="#FFFFFF" d="M472.861,343.96l-17.54,17.54l-3.08-3.68c-1.34-1.6-1.24-3.96,0.24-5.44l11.26-11.26
                        c1.48-1.48,3.84-1.58,5.44-0.24L472.861,343.96z"/>
                    <linearGradient id="SVGID_43_" gradientUnits="userSpaceOnUse" x1="355.441" y1="328" x2="355.441" y2="340.9059">
                        <stop  offset="0" style="stop-color:#F9CDAF"/>
                        <stop  offset="0.5359" style="stop-color:#F8CAAB"/>
                        <stop  offset="1" style="stop-color:#F7C4A1"/>
                    </linearGradient>
                    <path fill="url(#SVGID_43_)" d="M359.441,336c0,2.209-1.791,4-4,4h0c-2.209,0-4-1.791-4-4v-4c0-2.209,1.791-4,4-4h0
                        c2.209,0,4,1.791,4,4V336z"/>
                    <linearGradient id="SVGID_44_" gradientUnits="userSpaceOnUse" x1="411.4412" y1="280.25" x2="411.4412" y2="320.0055">
                        <stop  offset="0" style="stop-color:#FFFFED"/>
                        <stop  offset="0.3317" style="stop-color:#F6F6E8"/>
                        <stop  offset="0.8711" style="stop-color:#DEDEDB"/>
                        <stop  offset="1" style="stop-color:#D7D7D7"/>
                    </linearGradient>
                    <path fill="url(#SVGID_44_)" d="M440.542,299.004c0.354,0.611,0.354,1.382,0,1.993C434.655,311.148,421.127,318,411.441,318
                        c-9.686,0-23.214-6.852-29.101-17.004c-0.354-0.611-0.354-1.382,0-1.993C388.227,288.852,401.755,282,411.441,282
                        C421.127,282,434.655,288.852,440.542,299.004z"/>
                    <linearGradient id="SVGID_45_" gradientUnits="userSpaceOnUse" x1="411.4412" y1="291.375" x2="411.4412" y2="308.1255">
                        <stop  offset="0" style="stop-color:#353535"/>
                        <stop  offset="1" style="stop-color:#797979"/>
                    </linearGradient>
                    <path fill="url(#SVGID_45_)" d="M419.441,300c0,4.42-3.58,8-8,8s-8-3.58-8-8c0-4.42,3.58-8,8-8c0.82,0,1.6,0.12,2.36,0.36
                        c-0.24,0.5-0.36,1.06-0.36,1.64c0,2.2,1.8,4,4,4c0.58,0,1.14-0.12,1.64-0.36C419.321,298.4,419.441,299.18,419.441,300z"/>
                    <linearGradient id="SVGID_46_" gradientUnits="userSpaceOnUse" x1="331.441" y1="305.75" x2="331.441" y2="312.005">
                        <stop  offset="0" style="stop-color:#705340"/>
                        <stop  offset="1" style="stop-color:#93614C"/>
                    </linearGradient>
                    <path fill="url(#SVGID_46_)" d="M341.441,310c0,1.105-0.895,2-2,2h-16c-1.105,0-2-0.895-2-2v-2c0-1.105,0.895-2,2-2h16
                        c1.105,0,2,0.895,2,2V310z"/>
                    <linearGradient id="SVGID_47_" gradientUnits="userSpaceOnUse" x1="277.4412" y1="306" x2="321.441" y2="306">
                        <stop  offset="0" style="stop-color:#705340"/>
                        <stop  offset="1" style="stop-color:#93614C"/>
                    </linearGradient>
                    <path fill="url(#SVGID_47_)" d="M295.441,292h-4c-7.732,0-14,6.268-14,14c0,7.732,6.268,14,14,14h4c7.732,0,14-6.268,14-14
                        c6.627,0,12-5.373,12-12v-2H295.441z"/>
                    <path opacity="0.3" d="M413.441,294c0,0.08,0,0.18,0.02,0.26c-0.64-0.18-1.32-0.26-2.02-0.26c-4.08,0-7.44,3.06-7.94,7
                        c-0.04-0.32-0.06-0.66-0.06-1c0-4.42,3.58-8,8-8c0.82,0,1.6,0.12,2.36,0.36C413.561,292.86,413.441,293.42,413.441,294z"/>
                    <linearGradient id="SVGID_48_" gradientUnits="userSpaceOnUse" x1="315.852" y1="212.8384" x2="293.5186" y2="269.505">
                        <stop  offset="0" style="stop-color:#302926;stop-opacity:0"/>
                        <stop  offset="0.2844" style="stop-color:#2C2523;stop-opacity:0.0427"/>
                        <stop  offset="0.579" style="stop-color:#1F1B19;stop-opacity:0.0868"/>
                        <stop  offset="0.8773" style="stop-color:#0B0909;stop-opacity:0.1316"/>
                        <stop  offset="1" style="stop-color:#000000;stop-opacity:0.15"/>
                    </linearGradient>
                    <path fill="url(#SVGID_48_)" d="M322.761,214.52c-5.08,1.3-9.3,5.06-11.14,10.16l-15.02,42.04c-0.38,1.08-0.66,2.16-0.84,3.28h-8
                        c0.18-1.12,0.46-2.2,0.84-3.28l15.02-42.04c2.3-6.4,8.36-10.68,15.16-10.68C320.141,214,321.461,214.18,322.761,214.52z"/>
                    <path opacity="0.05" d="M295.441,326v4h-8c-3.72,0-6.86,2.54-7.74,5.98c-0.1-0.38-0.18-0.78-0.22-1.2
                        c-0.46-4.76,3.28-8.78,7.96-8.78H295.441z"/>
                    <linearGradient id="SVGID_49_" gradientUnits="userSpaceOnUse" x1="337.441" y1="396.62" x2="373.441" y2="396.62">
                        <stop  offset="0" style="stop-color:#302926;stop-opacity:0"/>
                        <stop  offset="1" style="stop-color:#000000;stop-opacity:0.1"/>
                    </linearGradient>
                    <path fill="url(#SVGID_49_)" d="M373.441,393.24v4c-6,1.8-11.74,2.76-18,2.76s-12-0.96-18-2.76v-4c6,1.8,11.74,2.76,18,2.76
                        S367.441,395.04,373.441,393.24z"/>
                    <linearGradient id="XMLID_2_" gradientUnits="userSpaceOnUse" x1="384.9879" y1="390.8494" x2="384.9879" y2="468.1949">
                        <stop  offset="0" style="stop-color:#3A3C3D"/>
                        <stop  offset="0.1553" style="stop-color:#3F4143"/>
                        <stop  offset="0.5848" style="stop-color:#484C50"/>
                        <stop  offset="1" style="stop-color:#4B4F54"/>
                    </linearGradient>
                    <path id="XMLID_4_" fill="url(#XMLID_2_)" d="M355.441,467.895l43.557-29.567c1.953-1.328,1.013-4.329-1.348-4.329h-3.877
                        c-1.702,0-2.621-1.997-1.513-3.289l21.795-25.427c0.635-0.741,0.64-1.832,0.012-2.578l-5.73-6.81
                        c-0.747-1.119-2.003-1.895-3.349-1.895h-13.547L355.441,467.895z"/>
                    <linearGradient id="XMLID_5_" gradientUnits="userSpaceOnUse" x1="2235.2637" y1="390.845" x2="2235.2637" y2="468.3001" gradientTransform="matrix(-1 0 0 1 2561 0)">
                        <stop  offset="0" style="stop-color:#3A3C3D"/>
                        <stop  offset="0.1553" style="stop-color:#3F4143"/>
                        <stop  offset="0.5848" style="stop-color:#484C50"/>
                        <stop  offset="1" style="stop-color:#4B4F54"/>
                    </linearGradient>
                    <path id="XMLID_3_" fill="url(#XMLID_5_)" d="M355.441,468l-45.263-29.595c-1.995-1.304-1.071-4.405,1.312-4.405h3.806
                        c1.671,0,2.599-1.932,1.556-3.237l-20.385-25.486c-0.596-0.745-0.58-1.808,0.039-2.535l5.739-6.742
                        c0.747-1.12,2.004-1.792,3.35-1.792L319.441,394L355.441,468z"/>
                    <linearGradient id="SVGID_50_" gradientUnits="userSpaceOnUse" x1="355.4412" y1="477.25" x2="355.4412" y2="490.0024">
                        <stop  offset="0" style="stop-color:#302926;stop-opacity:0"/>
                        <stop  offset="0.2844" style="stop-color:#2C2523;stop-opacity:0.0427"/>
                        <stop  offset="0.579" style="stop-color:#1F1B19;stop-opacity:0.0868"/>
                        <stop  offset="0.8773" style="stop-color:#0B0909;stop-opacity:0.1316"/>
                        <stop  offset="1" style="stop-color:#000000;stop-opacity:0.15"/>
                    </linearGradient>
                    <circle fill="url(#SVGID_50_)" cx="355.441" cy="484" r="6"/>
                    <linearGradient id="SVGID_51_" gradientUnits="userSpaceOnUse" x1="355.4412" y1="500.75" x2="355.4412" y2="515.0197">
                        <stop  offset="0" style="stop-color:#302926;stop-opacity:0"/>
                        <stop  offset="0.2844" style="stop-color:#2C2523;stop-opacity:0.0427"/>
                        <stop  offset="0.579" style="stop-color:#1F1B19;stop-opacity:0.0868"/>
                        <stop  offset="0.8773" style="stop-color:#0B0909;stop-opacity:0.1316"/>
                        <stop  offset="1" style="stop-color:#000000;stop-opacity:0.15"/>
                    </linearGradient>
                    <circle fill="url(#SVGID_51_)" cx="355.441" cy="508" r="6"/>
                    <linearGradient id="SVGID_52_" gradientUnits="userSpaceOnUse" x1="375.441" y1="475" x2="407.441" y2="475">
                        <stop  offset="0" style="stop-color:#73767A"/>
                        <stop  offset="0.0417" style="stop-color:#727579"/>
                        <stop  offset="0.529" style="stop-color:#65686C"/>
                        <stop  offset="1" style="stop-color:#616468"/>
                    </linearGradient>
                    <path fill="url(#SVGID_52_)" d="M407.441,478h-32v-4c0-1.105,0.896-2,2-2h28c1.105,0,2,0.895,2,2V478z"/>
                    <linearGradient id="SVGID_53_" gradientUnits="userSpaceOnUse" x1="408.1077" y1="488" x2="374.941" y2="488">
                        <stop  offset="0" style="stop-color:#3A3C3D"/>
                        <stop  offset="0.1553" style="stop-color:#3F4143"/>
                        <stop  offset="0.5848" style="stop-color:#484C50"/>
                        <stop  offset="1" style="stop-color:#4B4F54"/>
                    </linearGradient>
                    <path fill="url(#SVGID_53_)" d="M399.441,498h-16c-4.418,0-8-3.582-8-8v-12h32v12C407.441,494.418,403.859,498,399.441,498z"/>
                    <linearGradient id="SVGID_54_" gradientUnits="userSpaceOnUse" x1="398.8162" y1="469" x2="392.3162" y2="469">
                        <stop  offset="0" style="stop-color:#FFFFED"/>
                        <stop  offset="0.3251" style="stop-color:#FAFAEA"/>
                        <stop  offset="0.7272" style="stop-color:#EBEBE3"/>
                        <stop  offset="1" style="stop-color:#DCDCDC"/>
                    </linearGradient>
                    <polygon fill="url(#SVGID_54_)" points="389.441,472 395.441,466 401.441,472 "/>
                    <polygon fill="#FFFFFF" points="381.441,472 387.441,466 393.441,472 "/>
                    <path fill="#D3D3D3" d="M382.381,404l-4.98,6.06c-1.84,2.44-4.84,3.94-7.98,3.94h-27.96c-3.14,0-6.14-1.5-8.02-4.02l-4.94-5.98h5.18
                        l2.9,3.52c1.18,1.58,2.98,2.48,4.88,2.48h27.96c1.9,0,3.7-0.9,4.82-2.42l2.96-3.58H382.381z"/>
                </svg>
                </div>
                </div>
              <div class="col-md-6">
                <div class="login-form-body"> 
                    <div class="reg-bottom-logo login-mobile-logo text-center">
                    <svg fill="#000" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 35" width="150px">
                        <a fill="#000" xlink:href="#">
                        <defs></defs><title>Untitled-1</title><path d="M38.1745,8.3927H33.55V21.3481h1.8275V16.743h2.7972a4.1763,4.1763,0,1,0,0-8.35Zm0,6.6056H35.3773V10.1374h2.7972a2.3371,2.3371,0,0,1,2.4464,2.4391A2.329,2.329,0,0,1,38.1745,14.9983Z"></path><path d="M48.203,11.7214h-.4487a3.5955,3.5955,0,0,0-2.4814.8569v-.7361H43.498v9.5059h1.7749V16.1122a2.3781,2.3781,0,0,1,2.4814-2.6807h.4487Z"></path><path d="M53.0178,11.6524a4.9438,4.9438,0,1,0,5.0458,4.9427A4.9509,4.9509,0,0,0,53.0178,11.6524Zm0,8.1753a3.2326,3.2326,0,1,1,3.2534-3.2326A3.2174,3.2174,0,0,1,53.0178,19.8277Z"></path><path d="M62.6012,15.7723c-1.3672-.3441-2.0114-.5777-2.0114-1.23,0-.8152.8321-1.18,1.6568-1.18a1.8549,1.8549,0,0,1,1.83,1.0349l.1925.4685,1.5349-.8623-.164-.364a3.5506,3.5506,0,0,0-3.3931-1.9873c-1.9884,0-3.4316,1.2155-3.4316,2.89,0,2.0022,1.8147,2.4642,3.2729,2.8353,1.389.3536,2.0435.5942,2.0435,1.27,0,1.1232-1.5117,1.18-1.8147,1.18a2.0851,2.0851,0,0,1-2.1534-1.2162l-.1745-.5145-1.559.8911.1331.349a3.75,3.75,0,0,0,3.7538,2.2007c2.1134,0,3.59-1.1884,3.59-2.89C65.9062,16.6043,64.0737,16.143,62.6012,15.7723Z"></path><rect x="67.0438" y="7.8752" width="1.7748" height="13.4729"></rect><rect x="70.623" y="11.8422" width="1.7748" height="9.5059"></rect><path d="M71.51,8.3927A1.1227,1.1227,0,1,0,72.661,9.5065,1.1339,1.1339,0,0,0,71.51,8.3927Z"></path><path d="M79.3006,11.6524A4.6652,4.6652,0,0,0,75.977,12.95V11.8422H74.2022V24.7975H75.977V20.24a4.6647,4.6647,0,0,0,3.3236,1.298,4.943,4.943,0,1,0,0-9.8854Zm-.0526,1.71a3.2328,3.2328,0,1,1-3.271,3.2325A3.2172,3.2172,0,0,1,79.248,13.3626Z"></path><path d="M88.8488,15.7723c-1.3671-.3441-2.0113-.5777-2.0113-1.23,0-.8152.8321-1.18,1.6567-1.18a1.8548,1.8548,0,0,1,1.83,1.0348l.1924.4687,1.5349-.8624-.1638-.364a3.5505,3.5505,0,0,0-3.3932-1.9873c-1.9883,0-3.4315,1.2155-3.4315,2.89,0,2.0022,1.8147,2.4642,3.2729,2.8353,1.389.3536,2.0434.5942,2.0434,1.27,0,1.1232-1.5115,1.18-1.8146,1.18a2.0852,2.0852,0,0,1-2.1535-1.2162l-.1745-.5145-1.559.8911.1331.349a3.7508,3.7508,0,0,0,3.7539,2.2007c2.1134,0,3.5895-1.1884,3.5895-2.89C92.1539,16.6043,90.3213,16.143,88.8488,15.7723Z"></path><path d="M94.1789,10.6375a1.1227,1.1227,0,1,0-1.1506-1.131A1.1422,1.1422,0,0,0,94.1789,10.6375Z"></path><rect x="93.2915" y="11.8422" width="1.7748" height="9.5059"></rect><path d="M24.94,16.3364l-.0319.0078a6.9469,6.9469,0,0,1-.9234,2.0107,6.7668,6.7668,0,0,0,.9076-1.8529C24.9074,16.455,24.92,16.4073,24.94,16.3364Z"></path><path d="M25.0124,11.9986c-.131-.018-.2515-.0417-.3726-.0477-.263-.0132-.5266-.0227-.79-.0227q-4.8263,0-9.6524.0033c-.8406.0006-1.6812.0065-2.5218.01a5.596,5.596,0,0,0-1.2438.1327,6.3294,6.3294,0,0,0-3.2111,1.8262,6.6911,6.6911,0,0,0-1.9035,4.4871c-.0231.5718-.0234,1.1448-.0228,1.7172.0015,1.34.0128,2.6809.0145,4.0214.0012,1.027-.01,2.0539-.0087,3.0809.0009.8723.01,1.7447.0185,2.6171a2.3926,2.3926,0,0,0,.14.7745,2.068,2.068,0,0,0,1.1961,1.3029A2.1315,2.1315,0,0,0,7.78,32.018,1.9212,1.9212,0,0,0,9.21,31.1009a2.3274,2.3274,0,0,0,.2816-.72,4.492,4.492,0,0,0,.0714-.9493q.0174-1.4108.0281-2.8215.0146-1.6084.0271-3.2169c.0086-1.195.0122-2.39.0238-3.5851.004-.4086.017-.8176.0421-1.2254a2.9669,2.9669,0,0,1,.2122-.9395,1.62,1.62,0,0,1,.9133-.9231,3.0293,3.0293,0,0,1,.7364-.19,7.183,7.183,0,0,1,1.02-.0562q5.8079-.0009,11.6156-.0022a3.6813,3.6813,0,0,0,.7848-.0791c.0617-.0134.124-.0293.2025-.0484A7.6179,7.6179,0,0,0,25.0124,11.9986Z"></path><g class="cls-1"><image width="311" height="319" transform="translate(-11.52 -24) scale(0.24)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATcAAAE/CAYAAAAjcYRfAAAACXBIWXMAAC4jAAAuIwF4pT92AAAGd0lEQVR4Xu3cS5LbNhRAUSuV/W9ZGcVJJW6rW02CD5fnjDkiHi5A+fN4Pp8/AGr+ePUAwI7EDUgSNyBJ3IAkcQOSxA1IEjcgSdyAJHEDksQNSBI3IEncgCRxA5LEDUgSNyBJ3IAkcQOSxA1IEjcgSdyAJHEDksQNSBI3IEncgCRxA5LEDUgSNyBJ3IAkcQOSxA1IEjcgSdyAJHEDksQNSBI3IEncgCRxA5LEDUgSNyBJ3IAkcQOSxA1IEjcgSdyAJHEDksQNSBI3IEncgCRxA5LEDUgSNyBJ3IAkcQOSxA1IEjcgSdyAJHEDksQNSBI3IEncgCRxA5LEDUgSNyBJ3IAkcQOSxA1IEjcgSdyAJHEDksQNSBI3IEncgCRxA5LEDUgSNyBJ3IAkcQOSxA1IEjcgSdyApD9fPQBf9Xg8Hq+e+a/n8/l89Qx8xcNM8Y53AvYO0eNd4sanrIrZZwgenyFufGhS0D4idHxE3Phph5j9jtDxb+J2c7sH7SNCh7jdUDVoHxG6exK3G7lb1H5F6O5D3G5A1P5P5PrELUzUXhO5LnELErWvEbgmcYsRtveJXIu4RYjaMQSuQ9wChO14Irc/cduYqJ1L4PYmbpsStnVEbk/+s8oNCdta3vee3Nw2YpNdzy1uH25umxC2GazDPsRtAzbULNZjD+I2nI00k3WZz29uQ9k8e/Ab3FziNpCw7Ufk5vFZOoyw7cm6zSNug9ggcBxxG0LY9mcNZxE3OJDAzSFuA9gQLdZzBnG7mI3QZF2vJ24XsgHarO+1xO0iBh/OJW5wIofYdcTtAgb+Xqz3NcRtMYMOa4gbLOBQW0/cFjLg92b91xK3RQw2rCVusJBDbh1xW8BA82/mYQ1xO5lBhmuIG1zAoXc+cTuRAeZ3zMe5xO0kBheuJW5wIYfgecTtBAYWriducDGH4TnE7WAGFWYQNxjAoXg8cQOSxO1ATl+YQ9xgCIfjscQNSBK3gzh1YRZxg0EckscRNyBJ3A7gtIV5xA2GcVgeQ9yAJHH7JqcszCRuMJBD8/vEDUgSNyBJ3L7BpwPMJW4wlMPze8QNSBI3IEncgCRxe5PfQ2A2cQOSxA0G84XwPnEDksQNSBI3IEncgCRxA5LE7Q3+BAvmEzcgSdyAJHEDksQNSBI3IEnc3vB8Pp+vngGuJW5AkrgBSeIGJIkbkCRuQJK4AUniBoP5a0fvE7c3GTqYTdyAJHEDksQNSBI3GMrvut8jbt9g+GAucQOSxA1IEjcYyE8e3ydu32QIYSZxA5LEDYbxNXAMcTuAYYR5xA1IEjcYxFfAccTtIIYSZhE3IEncYAi3/2OJ24EMJ8whbkCSuMEAbv3HE7eDGVKYQdyAJHE7gdsbX2FeziFuQJK4ncRpzGeYk/OIG1xE2M4lbicyvHAdcTuZwPEr5uJ84gaLCdsa4raAYYb1xG0RgePHD3OwkrjBIsK2lrgtZLhhHXFbTODuybqvJ24XMOj3Yr2vIW5AkrhdxGl+D9b5OuJ2IYPfZn2vJW4XswGarOv1xA0OJmwziNsANgMcT9yGELgG6ziHuA1iY+zN+s0ibsPYIHuybvOI20A2yl6s10ziNpQNswfrNNfD2sz2eDwer55hPVGbT9w2IXJzCNsefJZuwoaawTrsQ9w2YmNdy/vfi8/STflMXUfU9uTmtikbbg3veV9ubgFucccTtf25uQXYiMfyPhvc3GLc4t4nai1ubjE26Hu8tx43tzC3uNdErcvNLczG/T3vp83N7Sbc4v4havcgbjd0x9AJ2v2I282VQydo9yZu/FQInaDxN3Hjl3YKnaDxK+LGSxNDJ2i8Im582RWxEzO+Stw4zBHREzGOIm5Akn+hACSJG5AkbkCSuAFJ4gYkiRuQJG5AkrgBSeIGJIkbkCRuQJK4AUniBiSJG5AkbkCSuAFJ4gYkiRuQJG5AkrgBSeIGJIkbkCRuQJK4AUniBiSJG5AkbkCSuAFJ4gYkiRuQJG5AkrgBSeIGJIkbkCRuQJK4AUniBiSJG5AkbkCSuAFJ4gYkiRuQJG5AkrgBSeIGJIkbkCRuQJK4AUniBiSJG5AkbkCSuAFJ4gYkiRuQJG5AkrgBSeIGJIkbkCRuQJK4AUniBiSJG5AkbkCSuAFJ4gYkiRuQJG5AkrgBSeIGJIkbkCRuQJK4AUniBiSJG5AkbkCSuAFJ4gYkiRuQJG5AkrgBSeIGJP0FcZXn6Op5bQAAAAAASUVORK5CYII="></image></g><path d="M29.4261,12.7875a13.4883,13.4883,0,0,0-1.08-3.6025,9.9948,9.9948,0,0,0-2.9275-3.7787A11.1084,11.1084,0,0,0,18.6522,2.985c-.8722-.0166-1.7447-.02-2.6171-.0243q-1.4382-.0075-2.8765-.0059-2.488.0006-4.9761.0054c-.3272.0005-.6546-.0044-.9814.0079a5.2152,5.2152,0,0,0-.704.0678,1.9839,1.9839,0,0,0-1.4091.9329,3.493,3.493,0,0,0-.1963.358,2.1619,2.1619,0,0,0-.0493,1.7973A2.16,2.16,0,0,0,6.357,7.4955a3.5676,3.5676,0,0,0,.8927.0869q2.8562.0029,5.7123.0047c1.9314.0012,3.8628-.0011,5.7941.0052a6.9971,6.9971,0,0,1,.951.063,5.9614,5.9614,0,0,1,2.0054.67,6.2364,6.2364,0,0,1,2.66,2.7266c-.0221-.044-.0348-.067-.0348-.067s.0127.023.0348.067a7.5645,7.5645,0,0,1,.3714.8634c.0086.024.013.0494.0223.0852l-.0134-.0019a7.62,7.62,0,0,1,.1558,4.3456l.0319-.0078c-.02.0709-.0328.1186-.0477.1656a6.7668,6.7668,0,0,1-.9076,1.8529v0a6.7479,6.7479,0,0,1-1.8841,1.793,6.2344,6.2344,0,0,1-3.2354,1.0159c-.3949.013-.7906.0065-1.1859.0068-.9634.0007-1.9268-.0022-2.89.0023a3.7576,3.7576,0,0,0-.624.0442A2.2465,2.2465,0,0,0,12.6627,24.68a2.1887,2.1887,0,0,0,1.9079,1.0044c1.2131.014,2.4266.0076,3.64.0072.5224,0,1.0447.0006,1.5661-.0482a9.6221,9.6221,0,0,0,2.6306-.6161,10.8659,10.8659,0,0,0,4.529-3.3289,11.4575,11.4575,0,0,0,2.5592-6.22A10.6438,10.6438,0,0,0,29.4261,12.7875Z"></path></a></svg>
                </div>
                    <h4 class="login-box-msg">Create your Employer Account</h4>

                    <!-- <a class="job-url" href="#">Are you looking for a job?</a> -->
                     <ValidationObserver v-slot="{ invalid }">
                    <form form @submit.prevent="submit" ref="frm_employer" id="frm_employer" method="POST" class="ajax-form" enctype='multipart/form-data'>
                    <div class="login-form-fx">
                    <div class="row g-3 login-form-left">
                        <div class="col-md-6">
                            <ValidationProvider rules="required" v-slot="{ errors }">
                            <div class="form-group has-feedback">
                                <input type="text" name="company_name" id="company_name"
                                        class="form-control" placeholder="Company Name*" v-model="company_name"/>
                                <span class="glyphicon glyphicon-envelope form-control-icon"></span>
                                <span class="help-block" style="color:red">{{ errors[0] }}</span>
                                <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.company_name">
                                    <span>{{ laravelErrors.company_name[0] }}</span>
                                </div>
                            </div>
                            </ValidationProvider>
                        </div> 
                        <div class="col-md-6">
                            <ValidationProvider rules="required|email" v-slot="{ errors }">
                            <div class="form-group has-feedback">
                                <input type="email" name="email"
                                        class="form-control" placeholder="Email*" v-model="email"/>
                                <span class="glyphicon glyphicon-envelope form-control-icon"></span>
                                 <span class="help-block" style="color:red">{{ errors[0] }}</span>
                                <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.email">
                                    <span>{{ laravelErrors.email[0] }}</span>
                                </div>
                            </div>
                            </ValidationProvider>
                        </div>              
                        </div>
                        <div class="row g-3 login-form-left">
                        <div class="col-md-12">  
                            <ValidationProvider rules="required" v-slot="{ errors }">             
                            <div class="form-group has-feedback">
                            <input type="text" name="name"
                                        class="form-control" placeholder="Company Representative Full Name" v-model="name"/>
                            <span class="glyphicon glyphicon-user form-control-icon"></span>
                             <span class="help-block" style="color:red">{{ errors[0] }}</span>
                            <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.name">
                                    <span>{{ laravelErrors.name[0] }}</span>
                                </div>
                            </div>
                            </ValidationProvider>
                        </div>
                        </div>
                        
                        <div class="row g-3 login-form-left">
                        <div class="col-md-12">
                             <ValidationProvider rules="required" v-slot="{ errors }">    
                            <div class="form-group has-feedback">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password*" autocomplete="off" v-model="password"/>
                                     <span class="help-block" style="color:red">{{ errors[0] }}</span>
                                    <span class="view-pw" ><a href="#"><img data-id="1" id="imgConfirm" src="/img/ic_hide_24_dark.png"></a></span>
                                    <p class="re-note" id="phoneLength">-At least 8 characters and a maximum of 20 characters</p>
                                        <p class="re-note" id="oneSpecial">-At least 1 special character (. ! @ # & ( ).+)</p>
                                        <p class="re-note" id="oneNumber">-At least 1 number [0-9]</p>
                                        <p class="re-note" id="oneSmallLetter">-At least one lowercase Latin character [a-z]</p>
                                        <p class="re-note" id="oneCapLetter">-At least one uppercase Latin character [A-Z]</p>                         
                           
                            <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.password">
                                    <span>{{ laravelErrors.password[0] }}</span>
                                </div>
                            </div>
                             </ValidationProvider>
                        </div>
                        </div>

                        <div class="row g-3 login-form-left">
                        <div class="col-md-12">
                        <div class="form-group has-feedback">
                        <div class="form-group input-icon industries-fields">                        
                        <div class="select-bx class-box lblClasi" id="lblClasi">
                        <ul>
                        <li>
                        <label class="form-check-label lblDrp" for="same-address">Industries Of Operation</label>
                        <div class="select-direction">
                            <span class="selectSpan">
                            <i class="fa fa-angle-down"></i>
                            </span>
                            <div class="right-cros"><img class="default-cross" src="/img/cross.svg">
                                <img class="show-hover" src="/img/crosson-hover.svg"></div>
                            </div>
                        </li>
                        </ul>
                        </div>
                        <div class="select-heading-list hide" style="display: none;">
                        <p style="display:none">{{ childCount = 0 }}</p>
                            <ul v-if="dataCategory" v-for="(value, key) in dataCategory">  
                                <li class="dropdown mainLi"  :id="'mainLi_'+key" :data-id="key">                                           
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input mainChk indChk" :data-id="key" :id="'mainChk_'+key" :name="`category[${value.parent.id}]`">
                                <label class="form-check-label" :for="'mainChk_'+key">{{  value.parent.value }}</label>
                                </div>
                                <ul class="nestedMenu" :id="'nestedMenu_'+key" style="display: none;" :data-id="key">
                                    <div class="all-heading">
                                        <div class="form-check">
                                        <input type="checkbox"  class="form-check-input all indChk" :id="'all_'+key" checked="checked" :data-id="key">
                                        <label class="form-check-label" :for="'all_'+key">All {{  value.parent.value }}</label>
                                        <span class="all_count" :id="'all_count_'+key">4217</span>
                                    </div>
                                    </div>                                                      
                                                                                                
                                    <li v-if="value.child" v-for="(value11, key11) in value.child">
                                    <div class="form-check">
                                    <input type="checkbox" class="form-check-input child indChk" :id="`child_${childCount}`" :data-id="`${childCount}`" :name="`category[${value.parent.id}][]`" :value="value11.id">
                                    <label class="form-check-label" :data-labelfor="`child_${childCount}`"  :for="`${childCount}`">{{ value11.value }} </label>
                                    <span :class="`${childCount}`" :id="`child_count_${childCount}`">1014</span>
                                    <p style="display:none">{{ childCount++ }}</p>
                                </div>
                                </li>                                                                                            
                                </ul>
                                </li>                                          </ul>
                            </div>
                          </div>
                        <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.category">
                        <span>{{ laravelErrors.category[0] }}</span>
                        </div>
                        </div>
                        </div>
                        </div>
                        <div class="row g-3 login-form-left">
                           <div class="col-md-6">
                             <ValidationProvider rules="required|mobile:8" v-slot="{ errors }"> 
                                <div class="form-group has-feedback">
                                <span class="ph-no">+357</span>
                                    <input class="form-control" id="mobile" name="mobile"
                                        placeholder="Phone Number*" type="text"  style="padding-left: 50px;" v-model="mobile" />
                                    <span class="glyphicon glyphicon-phone form-control-icon"></span>
                                    <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.mobile">
                                            <span>{{ laravelErrors.mobile[0] }}</span>
                                    </div>
                                    <span class="help-block" style="color:red" id="vue_mobile_error">{{ errors[0] }}</span>
                                    <div class="help-block" style="color:red">
                                        <span id="phoneerror"></span>
                                    </div>                       
                                </div>
                             </ValidationProvider>
                            </div>                            
                            <div class="col-md-6">
                                 <ValidationProvider rules="required" v-slot="{ errors }">
                                <div class="form-group has-feedback">
                                <select class="form-control" name="country_id" id="country_id" v-model="country_id">
                                <option value="">Select Country</option>
                                <option v-if="dataCountry" v-for="(valueC, keyC) in dataCountry" :value="valueC.id">{{ valueC.name }}</option>
                                </select>
                                <span class="help-block" style="color:red">{{ errors[0] }}</span>
                                    <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.country_id">
                                            <span>{{ laravelErrors.country_id[0] }}</span>
                                    </div>
                                </div>
                                 </ValidationProvider>
                            </div>           
                        </div>
                        <div class="row g-3 login-form-left">
                        <div class="col-md-6">
                            <ValidationProvider rules="required" v-slot="{ errors }">
                                <div class="form-group has-feedback">
                                <select class="form-control" name="location" id="location" v-model="location">
                                    <option value="" selected="selected">Select Location*</option>
                                    <option value="Nicosia">Nicosia</option>
                                    <option value="Larnaca">Larnaca</option>
                                    <option value="Limassol">Limassol</option>
                                    <option value="Paphos">Paphos</option>
                                    <option value="Famagusta">Famagusta</option>
                                </select>
                                <span class="help-block" style="color:red">{{ errors[0] }}</span>
                                <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.location">
                                    <span>{{ laravelErrors.location[0] }}</span>
                                </div>
                                </div>
                            </ValidationProvider>
                            </div>              
                            <div class="col-md-6 form-radio">
                            <ValidationProvider rules="required" v-slot="{ errors }">
                            <div class="form-group has-feedback">
                                <select class="form-control" name="verification_type" id="verification_type" v-model="verification_type">
                                    <option value="" selected="selected">Verification Method*</option>
                                    <option value="1">Email Verification</option>
                                    <option value="2" id="otpV">SMS Verification</option>
                                </select>
                                 <span class="help-block" style="color:red">{{ errors[0] }}</span>
                                <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.verification_type">
                                    <span>{{ laravelErrors.verification_type[0] }}</span>
                                </div>
                            </div>
                            </ValidationProvider>
                            </div>              
                        </div>

                        <div class="row g-3 login-form-left">   
                         <div class="col-md-12">                            
                            <div class="form-group has-feedback">
                                <input type="text" name="vat_no" class="form-control" placeholder="VAT Number" v-model="vat_no"/>
                                <span class="glyphicon glyphicon-user form-control-icon"></span>                                
                                <!-- <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.vat_no">
                                    <span>{{ laravelErrors.vat_no[0] }}</span>
                                </div> -->
                            </div>                          
                            </div>
                        </div>

                        <div class="row g-3 login-form-left">
                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                <textarea  :maxlength="max" v-model="company_description" class="form-control" name="company_description" id="company_description" placeholder="Company Description"></textarea>
                                <div class="input-group-addon" v-text="(max - company_description.length)"></div>
                                    <div class="help-block" style="color:red"  v-if="laravelErrors && laravelErrors.company_description">
                                        <span>{{ laravelErrors.company_description[0] }}</span>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
            
                    <div class="row g-3 login-form-left">
                        <div class="col-xs-12">
                            <div class="form-group has-feedback">
                                <div class="checkbox icheck">
                                    <label>
                                        <span><input name="is_notify" value="1" type="checkbox"/></span>
                                        <p>I would like to receive notifications by e-mail, for new candidates in my published job listings</p>
                                    </label>
                                    <label class="mt-2">
                                        <span><input name="privacy" id="privacy" value="1" type="checkbox"/></span>
                                        <p class="text-underline">By continuing you agree to Proslipsi's <a href='#'>Privacy Policy</a>, <a href='#'>Terms of Use</a> and use of <a href='#'>Cookies</a>.</p>
                                    </label>
                                    <label class="mt-2"> 
                                        <div class="help-block" style="color:red"  v-if="errors && errors.privacy">
                                        <span>In order to proceed with your registration, you need to accept our terms.</span>
                                    </div>                         
                                    </label>
                                </div>    
                                    
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    </div>
                        <div class="col-md-12 login-form-left">
                            <button id="btnSubmit" type="submit" class="btn browse-btn-fill w-100" :disabled="invalid">
                                Register
                                <span><img src="img/waiting.gif" width="21px" class="btnLoading" style="display:none" /></span>
                            </button>
                            
                        </div>
                        <div class="col-md-12 my-3 text-center">
                        <p class="login-text">Already have an account?<router-link class="" to="/login">Login Here</router-link>
                        </p>
                    </div>
                </form>
                </ValidationObserver>
            </div>
            </div>
            </div>
        </div>
        </div>
        <FlashMessage :position="'right bottom'"></FlashMessage>
    </main>
</template>
<script>
export default {
    data(){
        return {
            fields: {},
            laravelErrors: {},
            location: '',
            verification_type: '',
            dataCountry: [],
            dataCategory: [],
            max: 800,
            company_description:'',
            country_id: '',

        }      
    },
    mounted()
    {
        this.getCountries();
        this.getCategories();
        $('#location').on('mousedown',function()
        {
            $("option[value='']").hide();
        });
        $('#verification_type').on('mousedown',function()
        {
            $("option[value='']").hide();
        });
        $('#password').on('keyup keydown', function(e) 
        {
            var phone = $(this).val();
            var re = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=]).{8,20}$/;
            var oneNumber = /^(?=.*\d)/;
            var oneSmallLetter = /^(?=.*\d)(?=.*[a-z])$/;
            var oneCapLetter = /^(?=.*[A-Z])$/;
            var oneSpecial = /^(?=.*[@#$%^&+=])$/;
            var isValid = 1;
            if(/[0-9]/.test(phone))
            {
                $('#oneNumber').css('color','green');
            }
            else
            {
                $('#oneNumber').css('color','red');
                isValid = 0;
            }
            if(/[a-z]/.test(phone))
            {
                $('#oneSmallLetter').css('color','green');         
            }
            else
            {
                $('#oneSmallLetter').css('color','red');      
                isValid = 0;  
            }
            if(/[A-Z]/.test(phone))
            {
                $('#oneCapLetter').css('color','green');         
            }
            else
            {
                $('#oneCapLetter').css('color','red');  
                isValid =0;      
            }
            if(/[@#$%^&+=!()]/.test(phone))
            {
                $('#oneSpecial').css('color','green');         
            }
            else
            {
                $('#oneSpecial').css('color','red'); 
                isValid= 0;       
            }
            if(phone.length < 8 || phone.length > 20)
            {
                $('#phoneLength').css('color','red');
                isValid = 0;
            }
            else
            {
                $('#phoneLength').css('color','green');
            }
            if(isValid == 0)
            {
                $('#btnSubmit').attr('disabled',true);
            }
            else
            {
                $('#btnSubmit').attr('disabled',false); 
            }
                
        });

        $('#mobile').keyup(function()
        {
            var phone  = $(this).val(); 
            if(phone != '')
            {                   
                $('#verification_type').val('');
                if(phone.charAt(0) == '2' || phone.charAt(0) == '9')
                {
                    if(phone.charAt(0) == '2')
                    {
                        $('#otpV').prop('disabled', true)
                    }
                    else
                    {
                        $('#otpV').prop('disabled', false);
                    }
                    $(this).next().text('');
                    $('#btnSubmit').attr('disabled',false);
                }
                else
                {
                    if($('#vue_mobile_error').text().length  == '')
                    {
                        $('#phoneerror').text('Phone number is not valid!');
                    }
                    else
                    {
                            $('#phoneerror').text('');
                    }                            
                    //$(this).next().next().text('');
                    $('#btnSubmit').attr('disabled',true);
                }
            }
            else
            {
                    $('#phoneerror').text('');
            }
        });
        $('#imgConfirm').click(function()
        {
            var dataId = $(this).attr('data-id');
            if(dataId == 1)
            {
                    var url = "/img/ic_show_24_dark.png";
                $(this).attr('src',url);
                $(this).attr('data-id',2);
                $('#password').attr('type','text');
            }
            else
            {
                    var url = "/img/ic_hide_24_dark.png";
                
                $(this).attr('src',url);
                $(this).attr('data-id',1);
                $('#password').attr('type','password');
            }
        });
    },
    methods: {
        getCountries()
        {
            axios.get('/api/front/getCountries').then(response => {
               this.dataCountry = response.data;
            });
        },
        getCategories()
        {
            axios.get('/api/front/getCategory').then(response => {
                //console.log(response.data)
                this.dataCategory = response.data;
            });
        },
        submit() {
                   $('.btnLoading').show();
                    this.laravelErrors = {};
                    let formData = new FormData(this.$refs.frm_employer);
                    axios.post('/api/front/employerRegister', formData).then(response => {  
                         $('.btnLoading').hide();                     
                        if(response.data.status == 200)
                            {
                                console.log('abcd')
                                $('#frm_employer')[0].reset();
                                this.flashMessage.success({                                   
                                        message: response.data.message
                                    });
                                if(response.data.verification_type == 2)
                                {
                                    this.$router.push("/otpverify");
                                }                                
                            }
                            else if(response.data.status == 501)
                            {
                                 this.flashMessage.error({
                                     message: response.data.message                          
                                });
                            }      
                    }).catch(error => {
                         $('.btnLoading').hide();
                        if (error.response.status === 422) 
                        {
                            this.laravelErrors = error.response.data.errors || {};
                        }
                        else if(error.response.status === 500)
                        {
                                this.flashMessage.error({
                                    message: 'Oops! Registration not done'                      
                            });
                        }
                    });
                }
    },

}
</script>