import { defineStore } from 'pinia';
import { doc, collection, addDoc, updateDoc, deleteDoc, getDocs } from "firebase/firestore";
import { db } from 'src/boot/firebase';
import _ from 'lodash';

const foliosRef = collection(db, 'folios');

export const usefoliosStore = defineStore('folios', {
  state: () => ({
    folios: [],
  }),
  getters: {
    getfoliosFlat: state => Object.values(_.mapValues(state.folios, 'name')).sort(),
  },
  actions: {
    async getfolios () {
      try {
        const afolios = [];
        const querySnapshot = await getDocs(foliosRef);
        querySnapshot.forEach((doc) => {
          const edificio = doc.data();
          edificio.id = doc.id;
          afolios.push(edificio);
        });
        this.folios = afolios;
      } catch (e) {
        console.error("Error al traer documentos: ", e);
      }

    },
    async addEdificio (edificio) {
      try {
        const result = await addDoc(foliosRef, edificio);
        edificio.id = result.id;
        this.folios.unshift(edificio);
        return result;
      } catch (e) {
        console.error("Error al agregar documento: ", e);
        throw new Error(e.message);
      }
    },
    async updEdificio (newedificio) {
      try {
        await updateDoc(doc(foliosRef, newedificio.id), newedificio);
        let index = this.folios.findIndex((edificio) => edificio.id === newedificio.id);
        this.folios[index] = newedificio;
        return newedificio;
      } catch (e) {
        console.error("Error al actualizar documento: ", e);
        throw new Error(e.message);
      }
    },
    async delEdificio (edificioId) {
      try {
        await deleteDoc(doc(foliosRef, edificioId));
        this.folios = this.folios.filter(edificio => edificio.id !== edificioId);
        return edificioId;
      } catch (e) {
        console.error("Error al eliminar documento: ", e);
        throw new Error(e.message);
      }
    },
  },
});
