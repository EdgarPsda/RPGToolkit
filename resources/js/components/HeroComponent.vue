<template>
  <div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <button class="btn btn-primary" data-toggle="modal" data-target="#addHero">Add Hero</button>
        </div>
      </div>
      <div class="card">
        <div class="card-header">Heros List</div>

        <div class="card-body">
          <div class="col-md-12">
            <div class="row">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Level</th>
                    <th scope="col">Race</th>
                    <th scope="col">Class</th>
                    <th scope="col">Weapon</th>
                    <th scope="col">Stats</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(hero, index) in heros" :key="index">
                    <th scope="row">1</th>
                    <td>{{ hero.firstName }}</td>
                    <td>{{ hero.lastName }}</td>
                    <td>{{ hero.level }}</td>
                    <td>{{ hero.race }}</td>
                    <td>{{ hero.class }}</td>
                    <td>{{ hero.weapon }}</td>
                    <td>{{ hero.stats }}</td>
                    <td>
                      <div class="btn-group">
                        <a href="#" class="btn btn-info btn-sm">
                          <i class="fa fa-edit"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- The Modal -->
      <div class="modal fade" id="addHero">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add a new Hero</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
          <form @submit.prevent="submitForm" novalidate>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="race">Race</label>
                    <v-select
                      name="race"
                      @input="updateRace"
                      :value="hero.race"
                      :options="raceEnum"
                    />
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="firstName">First Name</label>
                    <v-select
                      name="firstName"
                      @input="updateFirstName()"
                      :value="hero.firstName"
                      :options="nameEnum"
                    />
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="class">Class</label>
                    <input type="text" class="form-control" />
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="weapon">Weapon</label>
                    <input type="text" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="stats">Stats</label>
                    <input type="text" class="form-control" readonly />
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <div class="row">
                <div class="col-md-12">
                  <small>* New hero starts with Level: 1</small>
                </div>
              </div>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  data() {
    return {
        newRace: ''
    };
  },
  created() {
    this.fetchData();
  },
  computed: {
    ...mapGetters("HerosIndex", ["heros", "loading"]),
    ...mapGetters("HerosSingle", ["hero", "nameEnum", "raceEnum"])
  },

  methods: {
    ...mapActions("HerosIndex", ["fetchData"]),
    ...mapActions("HerosSingle", ["setFirstName", "setRace", "getElfLastName"]),

    updateFirstName(value) {
      this.setFirstName(value);
      this.getElfLastName();
    },
    updateRace(value) {
      this.setRace(value);
    }
  }
};
</script>