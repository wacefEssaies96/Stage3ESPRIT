<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projects</title>


    <link rel="stylesheet" href=" {{ asset('css/base.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=" {{ asset('css/expertConsultingRightSide.css') }} ">

    <style>
        h5 {
            text-align: center;
        }

        p {
            display: block;
            margin-top: 1em;
            margin-bottom: 1em;
            margin-left: 10px;
            margin-right: 10px;
            font-size: 23px;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 2;
            /* text-indent: 75px; */
        }

        img {
            border-radius: 10px 100px / 120px;
        }

        body {
            background-color: white;
        }
    </style>

</head>

<body>

    <div class="page-content">
        {{-- ***************************************************************************************************************** --}}
        {{-- ********************************************* Left Side ********************************************************* --}}
        @include('layout.sidebar')
        {{-- ################################################################################################ --}}
        {{-- ################################################################################################ --}}

        {{-- ***************************************************************************************************************** --}}
        {{-- ********************************************** Right Side ******************************************************* --}}


        <div class="right-side">
            <div class="right-side-id">
                {{-- <div class="_id">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#818282"
                        class="bi bi-headset" viewBox="0 0 16 16">
                        <path
                            d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z" />
                    </svg>
                    <h3>Projects</h3>
                </div> --}}
                <div class="b_right-side-id"></div>
            </div>
            <div class="right-side-description">
                <h5 id="rs-des">Introduction</h5>
            </div>
            <div>

                <img style="margin-right: 20px; width: 45vh; float: left;" src="{{ asset('images/projects/1.png') }}">

                <p dir="rtl">الشراكة بين القطاع العام والقطاع الخاص <span dir="ltr">PPP،</span> عنوان ثالث
                    لتمويل مشاريع البنية التحتية والخدماتية الكبرى، بدون أي عبىء إضافي على موارد الدولة ... على أن تتوفر
                    الظروف الملائمة للإستثمار الداخلي والخارجي وإستراتيجية تنمية شاملة</p>

                <p dir="rtl">
                    أغلب المشاريع الكبرى في العالم تنفذ اليوم وفق هذه الصيغة التي تتغلب على مشكل التمويل وشح الموارد
                    المالية لدى الدول.
                    مثل <span dir="ltr">BRT DAKAR , TER DAKAR , SPORTS HUB SINGAPOR - DAKOTA , la seine musicale
                        France , HÔPITAL MUNICIPAL DE ÇAM VA SAKURA-ISTANBUL TURQUIE ....</span>

                </p>
                <p dir="rtl">
                    نحتاج إلى مشاريع كبرى في البنية التحتية والأساسية لتغيير وجه الحياة في تونس.

                    باش نكتشفوا مع بعضنا المشاريع الناجحة هاذم في البوستات الجاية بالتفصيل</p>

                <div class="right-side-description">
                    <h5 id="rs-des">La Seine musicale</h5>
                </div>
                <img style="margin-left: 20px; border-radius:10px; width: 45vh; float: right;"
                    src="{{ asset('images/projects/music.jpg') }}">
                <p dir="rtl">
                    عبارة عن مجموعة من المباني على شكل سفينة ، مخصصة للموسيقى ، مفتوحة لجميع الجماهير وقادرة على استيعاب
                    مختلف الأحداث (الفنية ، السياسية ، الاحتفالية ، التجارية ، إلخ). يقع على طرف مجرى النهر لجزيرة
                    Seguin في فرنسا
                    تم تنفيذ كل ذلك في إطار عقد شراكة بين القطاع العام و الخاص يغطي العقد تصميم المباني وتشييدها
                    وتمويلها وتشغيلها وصيانتها وينص على أنه يجب على المشغل تطوير إيرادات التشغيل من خلال تطوير البرامج
                    التي تظل على مسؤوليته ومخاطره ، بالإضافة إلى برمجة المجلس العام. في المقابل ، سوف يقوم المشغل بسداد
                    مبلغ مضمون مما يقلل التكلفة على المجتمع ، بحد أدنى 150.8 مليون يورو على مدى سبعة وعشرين عامًا.

                </p>
                <div class="right-side-description">
                    <h5 dir="rtl" id="rs-des">مشروع حافلة النقل السريع <span dir="ltr">(BRT)</span>
                    </h5>
                </div>
                <img style="margin-right: 20px; width: 45vh; float: left; border-radius: 5% / 70%;"
                    src="{{ asset('images/projects/BRT.jpg') }}">
                <p dir="rtl">مشروع في اطار الشراكة بين القطاع العام والخاص و يهدف إلى تسهيل النقل بين مدينتي
                    "دكار" و "غيجواي"
                    ويتمكن من نقل 300 ألف مسافر يوميا.
                    وقد وصلت التكاليف الإجمالية لمشروع حافلة النقل السريع إلى 300 مليار فرنك سيفا، وسيكون لديها
                    أسطول يتكون من 144 حافلة، ستنقل 300 ألف مسافر في 45 دقيقة بين الضواحي وسط داكار.
                </p>
                <p dir="rtl">ماذا تعنى
                    الحافلة السريعة للنقل <span dir="ltr">BRT</span>؟</p>

                <p dir="rtl">
                    هى نوع من الحافلات سريعة التردد أو الحافلة السريعة (بالإنجليزية: <span dir="ltr">Bus rapid
                        transit)‏</span> (أو اختصارًا <span dir="ltr">BRT</span>) هو نظام نقل عام مرن ومتكامل
                    يوفّر خدمة سريعة وآمنة، حيث يعتمد على حافلات ذات سعة كبيرة تسير على مسارات مخصّصة في حارات خاصة
                    بها، وتقدم مستوى عاليا من الخدمات، إذ تسير بترددات تصل إلى دقائق معدودة.
                </p>
                <div class="right-side-description">
                    <h5 dir="rtl" id="rs-des">ملعب 974 بقطر
                    </h5>
                </div>
                <img style="margin-left: 35%; margin-right: -50%; border-radius: 15% 10%; width: 45vh; "
                    src="{{ asset('images/projects/stage.jpg') }}">
                <p dir="rtl">
                    أو كما كان يعرف سابقاً استاد رأس أبو عبود هو ملعب كرة قدم، يتسع لـ40,000 متفرج. تمّ بنائه من حاويات
                    الشّحن البحري ووحدات بناء قابلة للتفكيك وهو من بين مشاريع الشراكة بين القطاع العام والخاص في قطر
                </p>

                <div class="right-side-description">
                    <h5 dir="rtl" id="rs-des">مستشفى باشاك شهير في أسطنبول
                    </h5>
                </div>
                <img style="margin-right: 20px; width: 45vh; float: left; border-radius: 10px;"
                    src="{{ asset('images/projects/turkia.jpg') }}">
                <p dir="rtl">عبارة عن مدينة طبية وهو أكبر مجمع طبى فى أوروبا
                    هذا هو مستشفى مدينة باشاك شهير Başakşehir الذي افتتح في تركيا
                </p>

                <p dir="rtl">- سعة 2682 سرير</p>
                <p dir="rtl"> - يحتوي على أكبر عازل زلزالي في العالم</p>
                <p dir="rtl"> - مجهز بأحدث التقنيات ،</p>
                <p dir="rtl"> - تقديم خدمة متواصلة في حالة وقوع زلزال.</p>
                <p dir="rtl"> - مساحة بناء 1،000،000 متر مربع ،</p>
                <p dir="rtl"> مشروع المستشفى جاء ثمرة لبروتوكول التعاون بين القطاع العام والخاص هو أكبر مشروع
                    استثماري في مجال الصحة في تركيا</p>
                <div class="right-side-description">
                    <h5 dir="rtl" id="rs-des">داكارالسنغال
                    </h5>
                </div>
                <img style="float: right; margin-left: 20px; border-radius: 15% 10%; width: 45vh; "
                    src="{{ asset('images/projects/dakar.jpg') }}">

                <p dir="rtl">
                    قطار <span dir="ltr">TER Dakar</span>
                    أول قطار سريع في غرب أفريقيا، بدأ القطار الجهوي السريع الذي يربط العاصمة السنغالية دكار بمطار بليز
                    داين الدولي ديسمبر الماضي أولى رحلاته.
                    يمكن من نقل 115 ألف شخص يوميا، وذلك عبر 14 محطة، بسرعة قصوى تصل إلى 160 كلم، فإن القطار يهدف إلى
                    تخفيف الازدحام في العاصمة دكار.</p>
                <p dir="rtl">
                    حسب السلطات الحكومية : إن مشروع الشراكة بين القطاعين العام والخاص هو نتيجة حزمة مالية مبتكرة تستند
                    إلى قرض ميسّر بنسبة 2٪ يمتد على مدى 25 عامًا

                </p>
                <br>
                <div class="right-side-description">
                    <h5 dir="rtl" id="rs-des">مركز سنغافورة الرياضي
                    </h5>
                </div>
                <img style="float: left; margin-left: 20px; border-radius: 15% 10%; width: 45vh; "
                    src="{{ asset('images/projects/singa.jpg') }}">

                <p dir="rtl">
                    قطار
                    <span dir="ltr">SINGAPORE SPORTS HUB</span>
                    استثمار عالي الأداء
                    بقيمة رأسمالية تبلغ 1.4 مليار دولار أمريكي ، تضمن المشروع بناء ملعب رياضي يتسع لـ 55000 مقعد ومركز
                    مائي وساحة داخلية متعددة الأغراض. تم الانتهاء من مرحلة البناء في عام 2014
                    وهو أكبر شراكة بين القطاعين العام والخاص في تاريخ سنغافورة ، كان هذا مشروعًا رفيع المستوى.

                </p>
                <br>
                <br>
                <br>
                <br>
                <div class="right-side-description">
                    <h5 id="rs-des">
                        Le partenariat public - privé
                    </h5>
                </div>
                <p dir="rtl">
                    الشراكة بين القطاع العام و الخاص المعروفة بال<span dir="ltr">PPP</span>

                    تهدف لتنويع مصادر تمويل المشاريع ودفع الاستثمار العمومي
                    انواع الPPP شراكة مؤسساتية أو شراكة تعاقدية الي تشمل عقود اللزمات وعقود الشراكة
                </p>
                <p dir="rtl"> علاش نلتجأو لل PPP ؟</p>
                <p dir="rtl"> امكانيات الدولة ماتمكنهاش لانجاز و صيانة البنية التحتية وتحسين المرافق العمومية اما
                    القطاع الخاص يملك التمويل، التصميم، انشاءات، صيانة، ....
                </p>
                <p dir="rtl"> فاش يتمثل الPPP ؟
                </p>
                <p dir="rtl"> هو Contrat لمدة محدودة بين طرف خاص وجهة عمومية يتضمن بشكل جزئي ولا كلي تصميم وتمويل
                    وانجاز ولاتهيئة وصيانة مشروع بهدف اسداء خدمة عمومية
                </p>

                <center>
                    <video width="400" style="width:80%; height:auto;" controls>
                        <source src="{{ asset('videos/borhene IGPPP.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </center>

                <center>
                    <video width="400" style="width:80%; height:auto;" controls>
                        <source src="{{ asset('videos/borhene igppp2.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </center>

                <center>
                    <video width="400" style="width:80%; height:auto;" controls>
                        <source src="{{ asset('videos/atef majdoub p2.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </center>

                <center>
                    <video width="400" style="width:80%; height:auto;" controls>
                        <source src="{{ asset('videos/atef majdoub p3mp4.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </center>
            </div>
            {{-- ***************************************************************************************************************** --}}
            {{-- ***************************************************************************************************************** --}}
        </div>

        <script src=" {{ asset('js/baseLeftSide.js') }} "></script>
        <script src=" {{ asset('js/windowAccess.js') }} "></script>
</body>

</html>
