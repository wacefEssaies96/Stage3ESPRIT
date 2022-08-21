<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Déposer votre dossiers</title>

    {{-- ========================================================================= --}}
    {{-- ========================================================================= --}}
    {{-- ========================================================================= --}}
    
    {{-- ========================================================================= --}}
    {{-- ========================================================================= --}}
    {{-- ========================================================================= --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script src=" {{ asset('js/baseLeftSide.js')}} "></script>
    <script src=" {{ asset('js/windowAccess.js') }} "></script>
    <script src=" {{ asset('js/_client/slide-container.js') }} "></script>
    <script src=" {{ asset('js/_client/folderUpload.js') }} "></script>

    <link rel="stylesheet" href=" {{ asset('css/base.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/_client/folderUpload.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/_client/slide-container.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/_client/upload-notification.css') }} ">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

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
                <div class="_id">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#818282" class="bi bi-folder-symlink" viewBox="0 0 16 16">
                        <path d="m11.798 8.271-3.182 1.97c-.27.166-.616-.036-.616-.372V9.1s-2.571-.3-4 2.4c.571-4.8 3.143-4.8 4-4.8v-.769c0-.336.346-.538.616-.371l3.182 1.969c.27.166.27.576 0 .742z"/>
                        <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm.694 2.09A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09l-.636 7a1 1 0 0 1-.996.91H2.826a1 1 0 0 1-.995-.91l-.637-7zM6.172 2a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
                    </svg>
                    <h3>DÉPÔT DU DOSSIER</h3>
                </div>
                <div class="b_right-side-id"></div>
            </div>

            <div class="right-side-description">
                <h5 id="rs-des">Informations générales</h5>
            </div>

            <div class="right-side-content slideshow-container">
                <form id="req" method="post" action=" {{ route('dossier.update') }} " enctype="multipart/form-data">
                    @csrf
                    <div class="form slides fade">
                        @php
                            $msg = "";
                            $_errors = NULL ; 
                            $proTitle = "";
                        @endphp
                        @isset($success)
                            <div class="push-success-notification">
                                <i class="bell fa"><a href="#id02">&#xf0f3;</a></i>
                            </div>
                            @php
                                $msg = $success;
                                $selector = 0;
                            @endphp
                        @endisset
                        @if (count($errors) > 0)
                            <div class="push-fail-notification">
                                <i class="bell fa"><a href="#id01">&#xf0f3;</a></i>
                            </div>
                            @php
                                $_errors = $errors
                            @endphp
                        @endif
                        {{-- ====================================== **1** =============================== --}}
                        <div class="field">
                            <input hidden type="text" name="id" value="{{$proData->id}}"/>
                            <input class="data" type="text" name="proTitle" required value="{{$proData->proTitle}}"/>
                            @error('proTitle')
                                <span class="invalid-feedback" role="alert" style="color: red">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                            <label for="input" alt="Nom du projet" placeholder="Ce champ est obligatoire"></label>
                        </div>
                        {{-- ======================================= **2** ============================== --}}
                        <div class="field">
                            <input class="data" type="text" name="proImp" required value="{{$proData->proImp}}"/>
                            @error('proImp')
                                <span class="invalid-feedback" role="alert" style="color: red">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                            <label for="input" alt="L’implantation du projet" placeholder="Ce champ est obligatoire"></label>
                        </div>
                        {{-- ======================================= **3** ============================== --}}
                        <div class="field">
                            <input class="data" type="text" name="proDesc" required value="{{$proData->proDesc}}"/>
                            @error('proDesc')
                                <span class="invalid-feedback" role="alert" style="color: red">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                            <label for="input" alt="Descriptif des activités et produits" placeholder="Ce champ est obligatoire"></label>
                        </div>
                        {{-- ======================================= **4** ============================== --}}
                        <div class="field">
                            <input class="data" type="text" name="proInteg" required value="{{$proData->proInteg}}"/>
                            @error('proInteg')
                                <span class="invalid-feedback" role="alert" style="color: red">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                            <label for="input" alt="Dans quelles industries s’intègre le projet ?" placeholder="Ce champ est obligatoire"></label>
                        </div>
                        {{-- ======================================== **5** ============================= --}}
                        <div class="field">
                            <input class="data" type="text" name="proTech" required value="{{$proData->proTech}}"/>
                            @error('proTech')
                                <span class="invalid-feedback" role="alert" style="color: red">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                            <label for="input" alt="Quel type de technologie utilisée dans le projet ?" placeholder="Ce champ est obligatoire"></label>
                        </div>
                        <div class="btns">
                            <button type="button" id="suivant" class="btn2" onclick="switchButton(2)">Suivant</button>
                        </div>
                        {{-- ============================================================================ --}}
                    </div>
                    <div class="attachment slides fade">
                        <h3 style="width:100%; vertical-align: middle;">Fichier(s) à transférer</h3>
                        <div class="icon">
                            <a href="{{route('download.zip',[$file->data])}}">
                                <img id="preview" src="{{ asset('/images/zip.png') }}" alt="NO IMAGE">
                                <p style="text-align: center;">{{$file->data}}</p>
                            </a>
                        </div>
                        <div class="addBtn">
                            <button class="trigger">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                <input hidden type="text" name="fileid" value="{{$file->id}}"/>
                                <input id="uploadedFiles" type="file" name="file" value="{{ $file->data }}" onchange="displayPreview(event)">
                            </button>
                        </div>
                        <div class="btns">
                            <button type="button" id="precedent" class="btn2" onclick="switchButton(1)">Précédent</button>
                            <button class="btn1" type="submit">Modifier</button>
                            @if (isset($success))
                                <button class="btn2" type="button" onclick="window.location='{{ route('sendProjectToADMIN', [Auth::user()->id, $proData->id]) }}'">Sauvegarder</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
{{-- ***************************************************************************************************************** --}}
{{-- ***************************************************************************************************************** --}}
    </div>

    {{-- ========================================= --}}
    <div id="id01" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <header id="fail" class="container">
                    <a href="#" class="closebtn">×</a>
                    <h2 class="fa">&#xf071; Une Erreur se produite</h2>
                </header>
                <div class="container">
                    <p>
                        <ul>
                            @if ($_errors != NULL)
                                @foreach ($_errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{-- ========================================= --}}
    <div id="id02" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <header id="success" class="container">
                    <a href="#" class="closebtn">×</a>
                    <h2 class="fa">&#xf14a; Succée</h2>
                </header>
                <div class="container">
                    <p>
                        {{ $msg }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{-- ========================================= --}}
    <script>beginSlide();</script>
</body>
</html>