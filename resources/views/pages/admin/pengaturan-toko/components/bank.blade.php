                <!-- Bank Transfer -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <i class="fas fa-university text-blue-600 text-xl mr-3"></i>
                            <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100">Transfer Bank</h4>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($banks as $bank)
                            <div class="payment-method-item">
                                <div
                                    class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-600 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 rounded-lg overflow-hidden border bg-white p-1.5 mr-3">
                                            <img src="{{ Str::startsWith($bank->logo, 'https://ui-avatars.com') ? $bank->logo : asset('storage/' . $bank->logo) }}"
                                                alt="GoPay" class="w-full h-full object-contain">
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900 dark:text-gray-100">
                                                {{ $bank->nama_bank }}</p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $bank->no_akun }}</p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $bank->nama_akun }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <label class="toggle-switch-sm">
                                            <input type="checkbox" data-id="{{ $bank->id }}" name="status"
                                                class="update-status" {{ $bank->status == 1 ? 'checked' : '' }}>
                                            <span class="slider-sm"></span>
                                        </label>
                                        <button onclick="editPaymentMethod({{ $bank->id }})"
                                            class="text-yellow-500 hover:text-yellow-600">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- E-Wallet -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <i class="fas fa-mobile-alt text-green-600 text-xl mr-3"></i>
                            <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100">E-Wallet</h4>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($wallets as $wallet)
                            <div class="payment-method-item">
                                <div
                                    class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-600 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 rounded-lg overflow-hidden border bg-white p-1.5 mr-3">
                                            <img src="{{ Str::startsWith($wallet->logo, 'https://ui-avatars.com') ? $wallet->logo : asset('storage/' . $wallet->logo) }}"
                                                alt="GoPay" class="w-full h-full object-contain">
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900 dark:text-gray-100">
                                                {{ $wallet->nama_bank }}</p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $wallet->no_akun }}
                                            </p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                {{ $wallet->nama_akun }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <label class="toggle-switch-sm">
                                            <input type="checkbox" data-id="{{ $wallet->id }}" name="status"
                                                class="update-status" {{ $wallet->status == 1 ? 'checked' : '' }}>
                                            <span class="slider-sm"></span>
                                        </label>
                                        <button onclick="editPaymentMethod({{ $wallet->id }})"
                                            class="text-yellow-500 hover:text-yellow-600">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
