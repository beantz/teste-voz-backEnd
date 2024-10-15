package AtvAbstract;

public class main {

	public static void main(String[] args) {
		Pagamento pagamento = new Pagamento("joao");
		
		pagamento.credito();
		pagamento.dinheiro();
	}

}
