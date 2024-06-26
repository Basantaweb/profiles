@extends('layouts.app')
  
@section('title', 'Edit Product')
  
@section('content')
<div class="container">
    <h5 class="mb-0">Edit Product</h5>
    <hr />
    <form action="{{ route('profile.update', $profile->id) }}" method="POST">
        @csrf
        @method('PUT')

        <table class="table table-striped table-bordered">
            @if($profile->count() > 0)
            <thead>
                <tr>
                    <th colspan="4">Name <label for="" class="p-2"><i class="fa fa-user fa-fw"></i></label></th>
                </tr>
            </thead>
            <tbody>
                <tr>                
                    {{-- <td>{{ $loop->iteration }}</td> --}}
                    <td class="align-middle">
                            @foreach (json_decode($profile->name, true) as $i=> $name)
                            @if($name != '' && $i == 'f-name')
                                <input type="text" name="f-name" value="{{ $name }}" class="form-control @error('f-name')is-invalid @enderror" placeholder="Frist Name">
                            @endif
                        @endforeach
                            @if ($errors->has('f-name'))
                                <span class="invalid-feedback">{{ $errors->first('f-name') }}</span>
                            @endif
                    </td>
                    <td>
                            @foreach (json_decode($profile->name, true) as $i=> $name)
                                @if($name != '' && $i == 'm-name')
                                    <input type="text" name="m-name" value="{{ $name }}" class="form-control" placeholder="Middle Name">
                                @endif
                                @if($name == '' && $i == 'm-name')
                                    <input type="text" name="m-name" value="{{ $name }}" class="form-control" placeholder="Middle Name">
                                @endif
                            @endforeach
                    </td>
                    <td>
                            @foreach (json_decode($profile->name, true) as $i=> $name)
                                @if($name != '' && $i == 'l-name')
                                    <input type="text" name="l-name"  value="{{ $name }}" class="form-control @error('l-name')is-invalid @enderror" placeholder="Last Name">
                                @endif
                            @endforeach
                            @if ($errors->has('l-name'))
                                <span class="invalid-feedback">{{ $errors->first('l-name') }}</span>
                            @endif
                       
                    </td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th>Primary Email <i class="fa fa-envelope fa-fw"></i></th>
                    <th>Secondary Email <i class="fa fa-envelope fa-fw"></i></th>
                    <th> Primary Mobile <i class="fa fa-phone fa-fw"></i></th>
                    <th> Secondary Mobile <i class="fa fa-phone fa-fw"></i></th>
                </tr>
            </thead>
            <tbody>
                
          
                {{-- @foreach($profile as $rss) --}}
                    <tr>
                        @foreach (json_decode($profile->email, true) as $i => $email)
                            @if($email != '' && $i == 'p-email')
                            <td class="align-middle">
                                <input type="text" value="{{ $email }}" name="p-email" class="form-control  @error('p-email')is-invalid @enderror" placeholder="Primary Email ">
                                @if ($errors->has('p-email'))
                                    <span class="invalid-feedback">{{ $errors->first('p-email') }}</span>
                                @endif
                            </td>
                            @endif
                            @if($email == '' && $i == 'p-email' )
                            <td class="align-middle">
                                <input type="text" name="p-email" class="form-control  @error('p-email')is-invalid @enderror" placeholder="Primary Email ">
                                @if ($errors->has('p-email'))
                                    <span class="invalid-feedback">{{ $errors->first('p-email') }}</span>
                                @endif
                            </td>
                            @endif
                            @if($email != '' && $i == 's-email' )
                                <td class="align-middle"><input type="text" name="s-email" value="{{ $email }}" class="form-control" placeholder="Secondary Email"></td>
                            @endif
                            @if($email == '' && $i == 's-email' )
                                <td class="align-middle"><input type="text" name="s-email" class="form-control" placeholder="Secondary Email"></td>
                            @endif
                        @endforeach
                        <td class="align-middle"> 
                            <input type="text" name="p-one" value="{{  $profile->phone_one }} " class="form-control  @error('p-one')is-invalid @enderror" placeholder="Primary Mobile ">
                            @if ($errors->has('p-one'))
                                <span class="invalid-feedback">{{ $errors->first('p-one') }}</span>
                            @endif
                        </td>
                        <td class="align-middle"><input type="text" value=" {{  $profile->phone_two }}" name="s-two" class="form-control" placeholder="Secondary Mobile"> </td>
                    </tr>
                {{-- @endforeach --}}
            
            </tbody>
            <thead>
                <tr>
                    <th> Education <i class="fas fa-graduation-cap"></i></th>
                    <th> Country <i class="fas fa-globe"></i></th>
                    <th> Job Name <i class="fas fa-briefcase"></i></th>
                    <th> Company Name <i class="far fa-building"></i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach (json_decode($profile->otherinfo, true) as $i => $otherinfos)
                        @if($otherinfos != '' && $i == 'country')
                            <td class="align-middle">
                            <input type="text" value="{{ $otherinfos }}" name="last-education" class="form-control @error('last-education')is-invalid @enderror" placeholder="Education">
                            @if ($errors->has('last-education'))
                                <span class="invalid-feedback">{{ $errors->first('last-education') }}</span>
                            @endif
                            </td>
                        @endif
                        @if($otherinfos == '' && $i == 'country')
                            <td class="align-middle">
                                <input type="text" value="{{ $otherinfos }}" name="last-education" class="form-control @error('last-education')is-invalid @enderror" placeholder="Education">
                            @if ($errors->has('last-education'))
                                <span class="invalid-feedback">{{ $errors->first('last-education') }}</span>
                            @endif    
                            </td>
                        @endif
                        @if($otherinfos != '' && $i == 'last-education')
                            <td class="align-middle"><input type="text" name="country" value="{{ $otherinfos }}" class="form-control" placeholder="Enter Your Country Name"></td>
                        @endif
                        @if($otherinfos == '' && $i == 'last-education')
                            <td class="align-middle"><input type="text" name="country" class="form-control" placeholder="Enter Your Country Name"></td>
                        @endif
                        @if($otherinfos != '' && $i == 'job-name')
                            <td class="align-middle"><input type="text" value="{{ $otherinfos }}" name="job-name" class="form-control" placeholder="Job Name"></td>
                        @endif
                        @if($otherinfos == '' && $i == 'job-name')
                            <td class="align-middle"><input type="text" name="job-name" class="form-control" placeholder="Job Name"></td>
                        @endif
                        @if($otherinfos != '' && $i == 'company-name')
                        <td class="align-middle"><input type="text" name="company-name" value="{{ $otherinfos }}" class="form-control" placeholder="Company Name"></td>
                        @endif
                        @if($otherinfos == '' && $i == 'company-name')
                            <td class="align-middle"><input type="text" name="company-name" class="form-control" placeholder="Company Name"></td>
                        @endif
                    @endforeach
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th> Primary Address <i class="fa fa-map-marker fa-fw"></i></th>
                    <th> Secondary Address <i class="fa fa-map-marker fa-fw"></i></th>
                    <th> Gender <i class="far fa-building"></i></th>
                    <th> Link List <i class="fa fa-external-link fa-fw"></i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">
                        @foreach (json_decode($profile->address, true) as $i => $address)
                            @if($address != '' && $i == 'p-address')
                            <textarea name="p-address" class="form-control @error('p-address')is-invalid @enderror" placeholder="Primary Address">{{ $address }}</textarea>
                            @if ($errors->has('p-address'))
                                <span class="invalid-feedback">{{ $errors->first('p-address') }}</span>
                            @endif
                            @endif
                        @endforeach
                    </td>
                    <td class="align-middle">
                        @foreach (json_decode($profile->address, true) as $i => $address)
                            @if($address != '' && $i == 's-address')
                                <textarea name="s-address" class="form-control" placeholder="Secondary Address">{{ $address }}</textarea>
                            @endif
                        @endforeach
                    </td>
                    <td class="align-middle">
                    <select name="gender" class="custom-select" multiple>
                        <option value="f" @if( $profile->gender == 'f') selected @endif>Female</option>
                        <option value="m" @if( $profile->gender == 'm') selected @endif>Male</option>
                        <option value="o" @if( $profile->gender == 'o') selected @endif>Others</option>
                    </select>
                    </td>
                    <td class="align-middle"><textarea class="form-control" name="links" placeholder="links">{{ $profile->links }}</textarea></td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th colspan="4"> ACHIEVE WORKING AND KNOWLEDGE <i class="fa fa-map-marker fa-fw"></i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle" colspan="4"><textarea name="basicinfo" id="editor_edit1" cols="30" rows="10" class="form-control">{!! $profile->basicinfo !!}</textarea></td>
                </tr>
            </tbody>       
            <thead>
                <tr>
                    <th colspan="4"> WORK EXPERIENCE <i class="fa fa-th-list fa-fw"></i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle" colspan="4"><textarea name="workExp" id="editor_edit2" cols="30" rows="10" class="form-control">{!! $profile->workExp !!}</textarea></td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th colspan="4"> EDUCATION & QUALIFICATIONS <i class="fa fa-th-list fa-fw"></i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle" colspan="4"><textarea name="education" id="editor_edit3" cols="30" rows="10" class="form-control">{!! $profile->education !!}</textarea></td>  
                </tr>
            </tbody>
            
            @else
                <tr>
                    <td class="text-center" colspan="5">profile not found</td>
                </tr>
            @endif
            <tfoot>
                <tr>
                    <td colspan="4">
                        <div class=" justify-content-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</div>
@endsection