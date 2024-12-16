<?php

?>
<div>
    <form class="" autocomplete="off" wire:submit.prevent="loginAttemp">
        <div class="form-group">
            <div class="form-label-group">
                <label class="form-label" for="email-address">Nama Pengguna</label>
            </div>
            <div class="form-control-wrap">
                <input autocomplete="off" type="text" class="form-control form-control-lg" required id="email-address"
                    placeholder="Nama Pengguna Kita Waspada" wire:model="username">
            </div>
            @error('username')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <div class="form-label-group">
                <label class="form-label" for="password">Password</label>
            </div>
            <div class="form-control-wrap">
                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                </a>
                <input autocomplete="new-password" type="password" class="form-control form-control-lg" required
                    id="password" placeholder="Password" wire:model="password">
            </div>
            @error('password')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        @if($this->attempt >= 5)
        <!-- Custom CAPTCHA: Display Random 4-Digit Number -->
        <div class="form-group">
            <div class="">
                <div class="captcha mb-3" style="position: relative">
                    <div class="text-center">{!! $captchaImg !!}</div>
                    <div>
                        <button type="button" class="btn btn-icon text-danger" id="reload"
                            wire:click.prevent="reloadCaptcha()"
                            style="position: absolute;bottom:25%; top:25%; right:0">
                            <i class="fa fa-undo"></i>
                        </button>
                    </div>
                </div>

                <input id="captcha" type="text" class="form-control form-control-lg" placeholder="Masukkan Captcha"
                    wire:model.defer="captcha">
            </div>
            @error('captcha')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>
        @endif

        <div class="form-group">
            <buton type="submit" class="btn btn-lg btn-primary btn-block" wire:click.prevent="loginAttemp">
                Masuk Aplikasi
            </buton>
        </div>
    </form>

</div>
