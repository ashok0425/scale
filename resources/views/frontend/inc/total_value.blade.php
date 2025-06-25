<div
                  class="before:brand-gradient relative rounded-lg bg-[#090118] p-6 before:!absolute before:-inset-[2px] before:-z-10 before:rounded-lg before:p-3"
                >
                  <div class="flex items-center justify-between gap-4 max-sm:flex-col">
                    <h3 class="font-inter text-lg leading-7 font-bold">Total Values:</h3>
                    <div class="flex items-center gap-2">
                      <span class="text-body-2 text-sm line-through">₹799/-</span>
                      <h3 class="dh-3 font-stretch-condensed">₹399</h3>
                    </div>
                  </div>
                  <p class="b3 text-text-light mt-2 mb-3 font-bold">
                    Join the exclusive network of forward-thinking professionals positioning
                    themselves at the forefront of the new service economy. These privileges
                    disappear when we launch – lock them in now or miss them forever. You can
                    download the value documentation
                    @if (request()->path()=='/')
                         <a href="{{$link}}" class="underline text-purple">here</a>

                        @else
                    @if (request()->path()=='freelancer')
                         <a href="{{url('/freelancers-agencies-benefit')}}" class="underline text-purple">here</a>
                    @endif
                    @if (request()->path()=='founders')
                         <a href="{{url('/founders-benefit')}}" class="underline text-purple">here</a>
                    @endif
                    @if (request()->path()=='investors')
                         <a href="{{url('/enabler-investor-mentor-benefits')}}" class="underline text-purple">here</a>
                    @endif
                    @endif

                  </p>
                  <div class="mt-3 flex items-center justify-between gap-4">
                    <div class="gradient-border-animated rounded-lg px-6 py-1">
                      <p class="b2 text-text-light animate-pulse font-semibold">
                        {{cms()->booked_seat}}/{{cms()->total_seat}} already registered
                      </p>
                    </div>
                    <a href="{{route('priority.access')}}" class="btn-primary hover:shadow-brand-purple/60 group hover:shadow-lg">
                      <span class="inner-wrapper inline-flex h-6 overflow-hidden">
                        <span
                          class="inner flex flex-col duration-200 group-hover:-translate-y-full"
                        >
                          <span class="text">Get Priority Access</span>
                          <span class="text">Get Priority Access</span>
                        </span>
                      </span>
                    </a>
                  </div>
                </div>
