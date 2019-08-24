<template>
	<div class="mt-4">

		<!-- Main Content -->
		<div class="row">

			<!-- list -->
			<div class="col-md-3">
				<div class="card card-outline card-info">
				
					<div class="card-header pb-0">
						<h3 class="card-title">List</h3>
						<div class="card-tools">
							
                            <!-- Sort -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="dropdown">
                                    <i class="fas fa-filter"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" :class="(sortBy == 'name') ? 'selected-link' : '' " @click="sortUser(1)">Doctor</a>
                                    <a class="dropdown-item" :class="(sortBy == 'email') ? 'selected-link' : '' " @click="sortUser(2)">Clinic</a>
                                    <a class="dropdown-item" :class="(sortBy == 'created_at') ? 'selected-link' : '' " @click="sortUser(3)">Session</a>	
                                    <a class="dropdown-item" :class="(sortBy == 'name') ? 'selected-link' : '' " @click="sortUser(1)">Day</a>
                                    <a class="dropdown-item" :class="(sortBy == 'name') ? 'selected-link' : '' " @click="sortUser(1)">Charge</a>
                                    <a class="dropdown-item" :class="(sortBy == 'name') ? 'selected-link' : '' " @click="sortUser(1)">Status</a>
                                    <div class="dropdown-divider"></div>
                                    <input class="ml-4" type="radio" id="asc_user" name="sortin" v-bind:value="true" v-model="sortAsc"> Ascending<br>
                                    <input class="ml-4" type="radio" id="desc_user" name="sortin" v-bind:value="false" v-model="sortAsc"> Descending<br>
                                </div>
                            </div>

                            <!-- Add new -->
                            <button type="button" class="btn btn-secondary btn-sm" @click="createUserModal">
                                <i class="fas fa-user-plus"></i>
                            </button>

						</div>
					</div>
				
					<div class="card-body table-responsive p-0">
						<table class="table table-hover">
							<tbody class="recycler-view-table">
								<tr
									class="recycler-view-item pl-1"
									v-bind:class="getActiveSchedule(schedule.id)"
									v-for="schedule in schedules"
									:key="schedule.id"
									@click="viewScheduleDetail(schedule)"
								>
									<p class="m-0 pt-2"><strong> {{ schedule.id }}</strong></p>
									<p class="m-0 pt-2"><strong> {{ schedule.status }}</strong></p>
								</tr>
							</tbody>
						</table>
					</div>
					
					<div class="card-footer">
						<h3 class="card-title pt-3 ml-3">Card Footer</h3>
					</div>

				</div>
			</div>

			<!-- Detail View  -->
			<div class="col-md-6" v-show="showDetailSchedule">

				<!-- Doctor title card -->
				<div class="card card-outline card-warning">
					<div class="card-header mb-0 pb-0">
						<h3 class="card-title">Dr. {{ user.name }}'s Profile</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" @click="closeDetailUser()">
								<i class="fas fa-close hover-red"></i>
							</button>
						</div>
					</div>
					<div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-responsive" width="100%" :src="'img/profile/' + doctor.photo" alt="User Image" style="object-fit: fill">
                            </div>
                            <div class="col-md-8">
                                <p class="m-0 pt-2"><strong> {{ sschedule.doctor_id }}</strong></p>
                                <p class="m-0 pt-2"><strong> {{ clinic.name }}</strong></p>
                                <p class="m-0 pt-2"><strong> {{ session.name }}</strong></p>
                                <p class="m-0 pt-2"><strong> {{ day.name }}</strong></p>
                                <p class="m-0 pt-2"><strong> {{ charge.amount }}</strong></p>
                            </div>
                        </div>
					</div>
				</div>

                <!-- Qualification -->
                <div class="card collapsed-card" v-show="qualifications.length">
                    <div class="card-header mb-0 pb-0">
						<h3 class="card-title">Qualifications</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-widget="collapse">
								<i class="fas fa-chevron-down hover-gold"></i>
							</button>
						</div>
					</div>
                    <div class="card-body">
                        <div v-for="item in qualifications" :key="item.id">
                            <li class="p-0 ml-2">{{ item.name }} from {{ item.college }} in {{ item.year }}.</li>
                        </div>
                    </div>
                </div>

                <!-- Specialisation -->
                <div class="card collapsed-card" v-show="specialisations.length">
                    <div class="card-header mb-0 pb-0">
						<h3 class="card-title">Specialisations</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-widget="collapse">
								<i class="fas fa-chevron-down hover-gold"></i>
							</button>
						</div>
					</div>
                    <div class="card-body">
                        <div v-for="item in specialisations" :key="item.id">
                            <li class="p-0 ml-2">{{ item.years }} yrs of experiance in {{ item.name }}.</li>
                        </div>
                    </div>
                </div>

                <!-- Experiance -->
                 <div class="card collapsed-card" v-show="experiences.length">
                    <div class="card-header mb-0 pb-0">
						<h3 class="card-title">Experiance</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-widget="collapse">
								<i class="fas fa-chevron-down hover-gold"></i>
							</button>
						</div>
					</div>
                    <div class="card-body">
                        <div v-for="item in experiences" :key="item.id">
                            <li class="p-0 ml-2">{{ item.feild }} from {{ item.institution }}.</li>
                        </div>
                    </div>
                </div>

                <!-- Awards -->
                 <div class="card collapsed-card" v-show="awards.length">
                    <div class="card-header mb-0 pb-0">
						<h3 class="card-title">Awards &amp; Achievements</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-widget="collapse">
								<i class="fas fa-chevron-down hover-gold"></i>
							</button>
						</div>
					</div>
                    <div class="card-body">
                        <div v-for="item in awards" :key="item.id">
                            <li class="p-0 ml-2">{{ item.name }}</li>
                        </div>
                    </div>
                </div>

                <!-- Services -->
                 <div class="card collapsed-card" v-show="services.length">
                    <div class="card-header mb-0 pb-0">
						<h3 class="card-title">Services</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-widget="collapse">
								<i class="fas fa-chevron-down hover-gold"></i>
							</button>
						</div>
					</div>
                    <div class="card-body">
                        <div v-for="item in services" :key="item.id">
                            <li class="p-0 ml-2">{{ item.name }}</li>
                        </div>
                    </div>
                </div>

                <!-- Membership  -->
                <div class="card collapsed-card" v-show="memberships.length">
                    <div class="card-header mb-0 pb-0">
						<h3 class="card-title">Membership</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-widget="collapse">
								<i class="fas fa-chevron-down hover-gold"></i>
							</button>
						</div>
					</div>
                    <div class="card-body">
                        <div v-for="item in memberships" :key="item.id">
                            <li class="p-0 ml-2">{{ item.name }}, {{ item.detail }}.</li>
                        </div>
                    </div>
                </div>

                <!-- Registration  -->
                <div class="card collapsed-card" v-show="registrations.length">
                    <div class="card-header mb-0 pb-0">
						<h3 class="card-title">Registrations</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-widget="collapse">
								<i class="fas fa-chevron-down hover-gold"></i>
							</button>
						</div>
					</div>
                    <div class="card-body">
                        <div v-for="item in registrations" :key="item.id">
                            <li class="p-0 ml-2">{{ item.name }}, {{ item.detail }}.</li>
                        </div>
                    </div>
                </div>

			</div>

			<div class="col-md-3" v-show="showDetailSchedule">

                <div class="card">
					<div class="card-header mb-0 pb-0">
						<h3 class="card-title">Schedule</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" @click="scheduleChangeModel()">
								<i class="fas fa-edit hover-gold"></i>
							</button>
                        </div>
					</div>
					<div class="card-body">
						<table>
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                            </tr>
						</table>
						
					</div>
				</div>
                
				<div class="card">
					<div class="card-header mb-0 pb-0">
						<h3 class="card-title">Quick Actions</h3>
					</div>
					<div class="card-body">
						<a class="qa-link" @click="addFamilyMember()">Book Appointment</a>
						<a class="qa-link" @click="addFamilyMember()">Add family member</a>
						<a class="qa-link" @click="addFamilyMember()">Add Health Record</a>
						<div class="dropdown-divider"></div>
						<a class="qa-link" @click="addFamilyMember()">Edit Profile</a>
						<a class="qa-link" @click="addFamilyMember()">Send Message</a>
						<a class="qa-link" @click="addFamilyMember()">Share Details</a>
						
					</div>
				</div>
			</div>

			<!-- No selected -->
			<div class="col-md-9" v-show="!showDetailUser" style="height: 83vh; pink; position: relative; border: 1px solid #b2b2b2 !important; border-radius: 5px;">
				<img class="center-image img-circle" src="img/avatar2.png" width="150px" height="150px">
			</div>

		</div>

		<!-- Add/Edit User Modal -->
		<div
			id="userModal"
			class="modal fade"
			tabindex="-1"
			role="dialog"
			aria-labelledby="userModalTitle"
			aria-hidden="true"
		>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalTitle">{{ modalTitle }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form
                        id="userForm"
                        @submit.prevent="modalMode ? createUser() : editUser()"
                        @keydown="form.onKeydown($event)"
                    >
                        <!-- Form fillable feilds -->
                        <div class="modal-body">
                            <!-- Name -->
                            <div class="form-group">
                                <input
                                    v-model="form.name"
                                    type="text"
                                    name="name"
                                    placeholder="Name"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('name') }"
                                >
                                <has-error :form="form" field="name"></has-error>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <input
                                    v-model="form.email"
                                    type="email"
                                    name="email"
                                    placeholder="Email"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('email') }"
                                >
                                <has-error :form="form" field="email"></has-error>
                            </div>

                            <!-- Member Role -->
                            <div class="form-group">
                                <select
                                    v-model="form.role"
                                    name="role"
                                    id="role"
                                    class="form-control"
                                    :class="{'is-invalid': form.errors.has('role')}"
                                >
                                    <option disabled value>Please select member role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">user</option>
                                    <option value="staff">Staff</option>
                                    <option value="trainer">Trainer</option>
                                    <option value="nutritionist">Nutritionist</option>
                                </select>
                                <has-error :form="form" field="role"></has-error>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <input
                                    v-model="form.password"
                                    name="password"
                                    type="password"
                                    class="form-control"
                                    placeholder="Password"
                                    id="password"
                                    :class="{'is-invalid': form.errors.has('password')}"
                                >
                                <has-error :form="form" field="password"></has-error>
                            </div>

                            <!-- Accept Terms -->
                            <div class="form-check ml-4">
                                <input
                                    v-model="form.terms"
                                    type="checkbox"
                                    class="form-check-input"
                                    id="agreeterms"
                                >
                                <label class="form-check-label" for="agreeterms">I agree terms and conditions.</label>
                                <has-error :form="form" field="terms"></has-error>
                            </div>
                        </div>

                        <!-- From submit & reset buttons -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" @click="resetForm">Reset</button>
                            <button type="submit" class="btn btn-primary" :disabled="form.busy">{{ modalAction }}</button>
                        </div>

                    </form>
                </div>
            </div>
		</div>

  </div>
</template>

<script>
import Avatar from 'vue-avatar'
export default {
  data() {
    return {
        modalMode: true,
        modalTitle: "",
        modalAction: "",
        editUserId: 0,
        schedules: {},
        sschedule: {},
        clinic: {},
        session: {},
        day: {},
        charge: {},
        
        users: {},
        user: {},
        doctor: {},
        qualifications: [],
        specialisations: [],
        experiences: [],
        awards: [],
        services:[],
        memberships: [],
        registrations: [],
        showDetailUser: false,
        activeUserId: 0,
        members: {},
        amember: {},
        showDetailMember: false,
        showDetailSchedule: true,
        activeScheduleId: 0,
        activeMemberId: 0,
        table_view: true,
        role: "doctor",
        sortBy: "name",
        sortAsc: true,
        showAboutTextFull: false,
        profileImageBackground: "#8e8e8e",
        lorem: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos sint quisquam velit perspiciatis quia, minus quibusdam repellat voluptas doloribus facilis aliquid, cupiditate sed. Minus similique, aspernatur officia consectetur facilis perferendis.",
        form: new Form({
            name: "",
            email: "",
            password: "",
            role: "",
            terms: ""
        })
    };
  },
  methods: {
    scheduleChangeModel() {
        alert('schedule');
    },
    textIsLong(text) {
        let string = text + "";
        return string.length > 200;
    },
    showText() {
        this.showAboutTextFull = !this.showAboutTextFull;
    },
    memberCardClass(name) {
        if(this.isUsersOwnProfile(name)) {
            return 'card-outline card-warning';
        } else {
            return 'collapsed-card';
        }
    },
    isMemberActive() {
        if (this.activeMemberId != 0)
            return 'activeMember';
    },
    editUserProfile() {
        console.log('edit');
    },
    closeDetailUser() {
        this.doctor = {};
        this.showDetailUser = false;
        this.amember = {};
        this.showDetailMember = false;
        this.activeMemberId = 0;
    },
    addFamilyMember() {
        console.log('adding family member');
    },
    // API calls
    loadSchedule() {
        axios.get("api/schedule")
        .then(({data}) => {
            (this.schedules = data)
        });
    },
    loadUser() {
      // if (this.$gate.canAccessAllMember()) {
				axios.get("api/doctor")
				.then(({ data }) => {
					(this.users = data)
					// console.log(data[5].photo[0].url);
				});
      // }
		},
		// Modals
    createUserModal() {
      this.form.reset();
      $("#userModal").modal("show");
      this.modalTitle = "Add New User";
      this.modalAction = "Create";
      this.modalMode = true; // means onSubmit it will send CREATE request
    },
    editUserModal(user) {
      $("#userModal").modal("show");
      this.modalTitle = "Edit User";
      this.modalAction = "Update";
      this.form.fill(user);
      this.editUserId = user.id;
      this.modalMode = false; // means onSubmit it will send UPDATE request
		},
		editMemberModal(user) {
      $("#userModal").modal("show");
      this.modalTitle = "Edit User";
      this.modalAction = "Update";
      this.form.fill(user);
      this.editUserId = user.id;
      this.modalMode = false; // means onSubmit it will send UPDATE request
    },
    changeUserRoleModal() {
        $("#changeUserRoleModal").modal("show");
    },
    sortUser($key) {
        console.log($key);
        switch ($key) {
            case 1:
                this.sortBy = "name";
                break;
            case 2:
                this.sortBy = "email";
                break;
            case 3:
                this.sortBy = "created_at";
                break;
            default:
                break;
        }
    },
    changeRole($key) {
        switch ($key) {
            case 1:
                this.role = "user";
                break;
            case 2:
                this.role = "member";
                break;
            case 3:
                this.role = "doctor";
                break;
            case 4:
                this.role = "staff";
                break;
            case 5:
                this.role = "admin";
                break;
            default:
                break;
        }
    },
    createUser() {
      // if (this.$gate.isAdmin()) {
      //   this.$Progress.start();
        this.form
          .post("api/user");
      //     .then(() => {
      //       Fire.$emit("reloadData");
      //       $("#userModal").modal("hide");
      //       Toast.fire({
      //         type: "success",
      //         title: "User created successfully"
      //       });
      //       this.$Progress.finish();
      //     })
      //     .catch(() => {
      //       this.$Progress.fail();
      //     });
      // } else {
      //   Swal.fire({
      //     title: "Unauthorized Action",
      //     text: "Contact your administrator to perform this action",
      //     type: "warning"
      //   });
      // }
    },
    editUser() {
      // if (this.$gate.isAdmin()) {
      //   if (this.editUserId > 0) {
      //     this.$Progress.start();
      //     this.form
      //       .put("api/user/" + this.editUserId)
      //       .then(() => {
      //         Fire.$emit("reloadData");
      //         $("#userModal").modal("hide");
      //         Toast.fire({
      //           type: "success",
      //           title: "User updated successfully"
      //         });
      //         this.editUserId = 0;
      //         this.$Progress.finish();
      //       })
      //       .catch(() => {
      //         this.editUserId = 0;
      //         this.$Progress.fail();
      //       });
      //   }
      // } else {
      //   Swal.fire({
      //     title: "Unauthorized Action",
      //     text: "Contact your administrator to perform this action",
      //     type: "warning"
      //   });
      // }
    },
    deleteUser(userId) {
      // if (this.$gate.isAdmin()) {
      //   Swal.fire({
      //     title: "Are you sure?",
      //     text: "You won't be able to revert this!",
      //     type: "warning",
      //     showCancelButton: true,
      //     confirmButtonColor: "#3085d6",
      //     cancelButtonColor: "#d33",
      //     confirmButtonText: "Yes, delete it!"
      //   }).then(result => {
      //     if (result.value) {
      //       // Send request to server
      //       this.form.delete("api/user/" + userId).then(() => {
      //         Fire.$emit("reloadData");
      //         Swal.fire("Deleted!", "Your file has been deleted.", "success");
      //       });
      //     }
      //   });
      // } else {
      //   Swal.fire({
      //     title: "Unauthorized Action",
      //     text: "Contact your administrator to perform this action",
      //     type: "warning"
      //   });
      // }
    },
    resetForm() {
      this.form.reset();
    },
    processFile(event) {
      this.photo = event.target.files[0];
    },
    getResults(page = 1) {
      // Our method to GET results from a Laravel endpoint
      axios.get("api/user?page=" + page).then(response => {
        this.users = response.data;
      });
    },
    viewUserDetail(clickedUser) {
        this.showDetailUser = true;
        this.activeUserId = clickedUser.id;
        this.user = clickedUser;
        this.doctor = clickedUser.doctor;
        this.qualifications = clickedUser.qualification;
        this.specialisations = clickedUser.specialisation;
        this.experiences = clickedUser.experience;
        this.awards = clickedUser.award;
        this.services = clickedUser.service;
        this.memberships = clickedUser.membership;
        this.registrations = clickedUser.registration;
    },
    viewScheduleDetail(clickedItem) {
        this.showDetailSchedule = true;
        this.activeScheduleId = clickedItem.id;
        this.sschedule = clickedItem;
        this.clinic = clickedItem.clinic;
        this.session = clickedItem.session;
        this.day = clickedItem.day;
        this.charge = clickedItem.charge;
	},
    userProfilePhoto(user) {
        console.log(Object.values(user.photo.length));
        /*let photo = Object.values(user.photo).length;
        if(photo > 0) {
		    Object.keys(user.photo).forEach(function(key) {
				console.log("img/profile/" + user.photo[key].thumb);
			});
		} else {
            return "img/profile/default.png";
		}*/
	},
    getActiveUser(clickedUserId) {
        if (this.activeUserId === clickedUserId) {
            return "activeUser";
        }
	},
    getActiveMember(clickedMemberId) {
        if (this.activeMemberId === clickedMemberId) {
            return "activeMember";
        }
    },
    getActiveSchedule(clickedItemId) {
        if (this.activeScheduleId === clickedItemId) {
            return "activeMember";
        }
	},
    orderedUsers() {
        if (Object.keys(this.users).length > 0) {
            let result = _.orderBy(this.users, this.sortBy);
            if(!this.sortAsc) {
                return result.reverse();
            } else {
                return result;
            }
        } else {
            return this.users;
        }
    },
  },
  created() {
    // this.$Progress.start();
    this.loadUser();
    this.loadSchedule();

    // Fire.$on("reloadData", () => {
    //   this.loadUser();
    // });
    // Fire.$on("searching", () => {
    //   let query = this.$parent.search;
    //   axios
    //     .get("api/findUser?q=" + query)
    //     .then(data => {
    //       this.users = data.data;
    //     })
    //     .catch(() => {});
    // });
  },
  mounted() {
		console.log("Component mounted.");		
    // this.$Progress.finish();
	},
	components: {
		Avatar
	}
};
</script>


<style scoped>
.pl-4,
.card-body.p-0 .table thead > tr > th:first-of-type,
.card-body.p-0 .table thead > tr > td:first-of-type,
.card-body.p-0 .table tbody > tr > th:first-of-type,
.card-body.p-0 .table tbody > tr > td:first-of-type,
.px-4 {
  padding-left: 0 !important;
}

.table .recycler-view-table th,
.table .recycler-view-table td {
  padding: 0 !important;
  border: 0 !important;
}

.table .recycler-view-table td:hover {
  background-color: #ededed;
}

.recycler-view-item {
  /* background-color: red !important; */
  border-bottom: 1px solid #b2b2b2;
}

.qa-link {
	display: block;
	cursor: pointer;
}

.qa-link:hover {
	color: dodgerblue !important;
}

.profile-image {
  width: 120px;
	height: 120px;
}

.profile-image-thumb {
  width: 40px;
  height: 40px;
  margin: 4px;
}

.profile-header {
  height: 160px;
  padding-top: 10px;
  padding-left: 15px;
  background-image: linear-gradient(
    to bottom right,
    rgba(255, 217, 0, 0.8),
    rgba(255, 166, 0, 0.8)
  );
}

.profile-name {
  font-variant: small-caps;
  font-size: 1.2rem;
}

.profile-email,
.profile-mobile,
.profile-id {
  font-size: 1rem;
  font-weight: 100;
}

.member-card-table>tr>td:hover {
	background-color: rgba(0, 100, 150, 0.1) !important;
}

.nav-item {
  min-width: 80px !important;
}
.nav-tabs {
  margin-top: 57px;
}

.activeUser {
  background-image: linear-gradient(
    to bottom right,
    rgba(255, 217, 0, 0.1),
    rgba(255, 166, 0, 0.5)
	);
}

.activeMember {
  background-image: linear-gradient(
    to bottom right,
    rgba(0, 100, 150, 0.1),
    rgba(0, 100, 150, 0.5)
	);
}

.card-title {
  z-index: 200;
}

.card-footer {
  padding: 0;
}

.img-circle {
  font-size: 18px;
  text-align: center;
  font-weight: 600;
}

/* .active {
  width: 20px;
  height: 20px;
  background-color: green;
  position: absolute;
  right: 0;
  margin-top: -25px;
  margin-left: -20px;
} */

.bg-red {
  background-image: linear-gradient(
    to bottom right,
    rgb(255, 0, 0),
    rgb(255, 71, 71)
  );
}

.bg-gold {
  background-image: linear-gradient(
    to bottom right,
    rgb(160, 0, 150),
    rgb(179, 44, 170)
  );
}

.bg-green {
  background-image: linear-gradient(
    to bottom right,
    rgb(0, 160, 0),
    rgb(60, 180, 60)
  );
}

.bg-blue {
  background-image: linear-gradient(
    to bottom right,
    rgb(0, 80, 255),
    rgb(35, 105, 255)
  );
}
</style>
