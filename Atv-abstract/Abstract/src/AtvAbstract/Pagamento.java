package AtvAbstract;

public class Pagamento extends FormasPagamento {
	private String nome;
	
	public Pagamento(String nome) {
		
		this.nome = nome;
		
	}
	
	@Override
	void credito() {
		System.out.println("O pagamento no cartão de credito com nome de "+ nome+ " foi feito com sucesso!");
	}
	
	@Override
	void dinheiro() {
		System.out.println("pagamento em dinheiro feito com sucesso!");
	}
	
}
